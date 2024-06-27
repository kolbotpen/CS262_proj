<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Company;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function showAddTeamForm()
    {
        $companies = Company::all();
        return view('admin.admin-addteam', compact('companies'));
    }
    public function showTeamAddForm()
    {
        $companies = Company::all(); // Fetch all companies
        return view('boss.team-add', compact('companies')); // Pass companies to the view
    }
    // STORING TEAM IN ADMIN 
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'company_id' => 'required|exists:companies,id',
        ]);

        $team = new Team;
        $team->name = $request->name;
        $team->company_id = $request->company_id;
        $team->save();

        return redirect()->route('team.workspace')->with('status', 'Team added successfully!');
    }

    // STORING TEAM IN BOSS
    public function storeInBoss(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'company_id' => 'required|exists:companies,id',
        ]);

        $team = new Team;
        $team->name = $request->name;
        $team->company_id = $request->company_id;
        $team->save();

        // Redirect back to the same page
        return back()->with('status', 'Team added successfully!');
    }

    public function showWorkspace(Request $request)
    {
        $query = Team::with('company', 'users');

        // Check if a company_id is present in the request
        if ($request->has('company_id') && $request->company_id != '') {
            $query->where('company_id', $request->company_id);
        }

        $teams = $query->get();
        $companies = Company::all(); // Assuming you have a Company model

        return view('admin.team-workspace', compact('teams', 'companies'));
    }


    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('team.workspace')->with('success', 'Team Deleted Successfully');
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required',
            'company_id' => 'required|exists:companies,id',
        ]);

        $team->name = $request->name;
        $team->company_id = $request->company_id;
        $team->save();

        return redirect()->route('team.workspace')->with('success', 'Team updated successfully!');
    }
    public function showAllTeams($companyId)
    {
        $teams = Team::where('company_id', $companyId)->get();
        $company = Company::findOrFail($companyId);
        return view('boss.team-all', ['teams' => $teams, 'company' => $company]);
    }
    public function addMember(Request $request)
    {
        $request->validate([
            'team_id' => 'required|exists:teams,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $team = Team::findOrFail($request->team_id);

        // Check if the user is already a member of the team
        if ($team->users()->where('user_id', $request->user_id)->exists()) {
            // Return with an error message if the user is already a member
            return back()->with('error', 'This user is already a member of the team.');
        }

        // Attach the user to the team if they are not already a member
        $team->users()->attach($request->user_id);

        return back()->with('status', 'Member added successfully!');
    }
    public function showTeam(Team $team)
    {
        return view('boss.team', compact('team'));
    }
    public function showOneTeam($id)
    {
        $team = Team::with('users')->findOrFail($id);
        $companyId = $team->company_id; // Assuming company_id exists on the Team model
        $company = Company::findOrFail($companyId);

        return view('boss.team', compact('team', 'company'));
    }
    public function removeMember($team_id, $user_id)
    {
        $team = Team::findOrFail($team_id);
        $team->users()->detach($user_id);

        return back()->with('success', 'User removed from the team successfully.');
    }


    // VISOTH WAS HERE
    public function checkTeamName(Request $request)
    {
        $exists = Team::where('name', $request->name)
            ->where('company_id', $request->company_id)
            ->exists();
        return response()->json(['exists' => $exists]);
    }


}
