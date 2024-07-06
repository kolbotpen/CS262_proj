<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::with('company:id,name')->latest()->get();
        
        if ($teams->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No Team found!',
            ], 200);
        }

        $response = [
            'status' => 'success',
            'message' => 'Teams are retrieved successfully.',
            'data' => $teams,
        ];

        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $company_id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:250',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error!',
                'data' => $validate->errors(),
            ], 403);
        }

        $user = Auth::user();
        $isBoss = $user->companies()->where('company_id', $company_id)->wherePivot('is_boss', 1)->exists();
        if (!$isBoss) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized: Only the boss can create a team.',
            ], 403);
        }

        $teamExists = Team::where('name', $request->name)->where('company_id', $company_id)->exists();

        if ($teamExists) {
            return response()->json([
                'status' => 'failed',
                'message' => 'The team name already exists within this company.',
            ], 403);
        }

        $team = Team::create(array_merge($request->all(), ['company_id' => $company_id]));

        $response = [
            'status' => 'success',
            'message' => 'Team is added successfully.',
            'data' => $team,
        ];

        return response()->json($response, 200);
    }

    public function show($id)
    {
        $team = Team::find($id);

        if (is_null($team)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Team is not found!',
            ], 200);
        }

        $response = [
            'status' => 'success',
            'message' => 'Team is retrieved successfully.',
            'data' => $team,
        ];
        
        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $company_id, $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:250',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error!',
                'data' => $validate->errors(),
            ], 403);
        }

        $team = Team::find($id);
        $companyExists = Team::where('company_id', $company_id)->exists();
        if (!$companyExists) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized: Specified Company does not exist.',
            ], 403);
        }
        if (is_null($team)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Team is not found!',
            ], 200);
        }

        $user = Auth::user();
        $isBoss = $user->companies()->where('company_id', $company_id)->wherePivot('is_boss', 1)->exists();

        if (!$isBoss) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized: Only the boss can update the team.',
            ], 403);
        }

        $teamExists = Team::where('name', $request->name)
            ->where('company_id', $company_id)
            ->where('id', '!=', $id)
            ->exists();

        if ($teamExists) {
            return response()->json([
                'status' => 'failed',
                'message' => 'The team name already exists within this company.',
            ], 403);
        }

        $team->update($request->only('name'));

        $response = [
            'status' => 'success',
            'message' => 'Team is updated successfully.',
            'data' => $team,
        ];

        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, $company_id)
    {
        $team = Team::find($id);

        if (is_null($team)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Team is not found!',
            ], 200);
        }

        $user = Auth::user();
        $isBoss = $user->companies()->where('company_id', $company_id)->wherePivot('is_boss', 1)->exists();

        if (!$isBoss) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized: Only the boss can delete the team.',
            ], 403);
        }

        Team::destroy($id);

        return response()->json([
            'status' => 'success',
            'message' => 'Team is deleted successfully.'
        ], 200);
    }

    /**
     * Search by a team name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        $teams = Team::where('name', 'like', '%'.$name.'%')
            ->latest()->get();

        if (is_null($teams->first())) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No team found!',
            ], 200);
        }

        $response = [
            'status' => 'success',
            'message' => 'Teams are retrieved successfully.',
            'data' => $teams,
        ];

        return response()->json($response, 200);
    }

    /**
     * Search for teams by company name.
     *
     * @param  string  $company_name
     * @return \Illuminate\Http\Response
     */
    public function searchByCompanyName($company_name)
    {
        $teams = Team::whereHas('company', function ($query) use ($company_name) {
            $query->where('name', 'like', '%' . $company_name . '%');
        })->with('company:id,name')->get();

        if ($teams->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No teams found for the specified company name.',
            ], 404);
        }

        $response = [
            'status' => 'success',
            'message' => 'Teams are retrieved successfully.',
            'data' => $teams,
        ];

        return response()->json($response, 200);
    }
    /**
     * Add a user to a team.
     */
    public function addMemberToTeam(Request $request, $company_id, $team_id)
    {
        $validate = Validator::make($request->all(), [
            'user_id' => 'required|integer|exists:users,id',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error!',
                'data' => $validate->errors(),
            ], 403);
        }

        $user_id = $request->input('user_id');

        $user = Auth::user();
        $team = Team::find($team_id);

        $isBoss = $user->companies()->where('company_id', $company_id)->wherePivot('is_boss', 1)->exists();
        if (!$isBoss) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized: Only the boss can add members to the team.',
            ], 403);
        }

        if ($team->users()->where('user_id', $user_id)->exists()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'User is already a member of the team.',
            ], 403);
        }
        $team->users()->attach($user_id);

        return response()->json([
            'status' => 'success',
            'message' => 'User added to the team successfully.',
        ], 200);
    }
}
