<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    /**
     * Update the is_boss value for a user in a company.
     */
    public function updateIsBoss(Request $request, $company_id)
    {
        // Validate the incoming request
        $validate = Validator::make($request->all(), [
            'user_id' => 'required|integer|exists:users,id',
            'is_boss' => 'required|boolean',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error!',
                'data' => $validate->errors(),
            ], 403);
        }

        $user_id = $request->input('user_id');
        $is_boss = $request->input('is_boss');

        $user = Auth::user();

        // Check if the authenticated user is a boss in the company
        $isBoss = $user->companies()->where('company_id', $company_id)->wherePivot('is_boss', 1)->exists();

        if (!$isBoss) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized: Only a boss can update this value.',
            ], 403);
        }

        // Ensure the user being updated is part of the company
        $userToUpdate = User::find($user_id);
        $isUserInCompany = $userToUpdate->companies()->where('company_id', $company_id)->exists();

        if (!$isUserInCompany) {
            return response()->json([
                'status' => 'failed',
                'message' => 'The user is not part of the specified company.',
            ], 403);
        }

        // Check if the current user being updated is a boss
        $isCurrentBoss = $userToUpdate->companies()->where('company_id', $company_id)->wherePivot('is_boss', 1)->exists();

        // If trying to demote a boss, ensure there's at least one boss left
        if ($is_boss == false && $isCurrentBoss) {
            $currentBossCount = User::whereHas('companies', function ($query) use ($company_id) {
                $query->where('company_id', $company_id)->where('is_boss', 1);
            })->count();

            if ($currentBossCount <= 1) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'There must be at least one boss in the company.',
                ], 403);
            }
        }

        // Update the is_boss value in the pivot table
        $userToUpdate->companies()->updateExistingPivot($company_id, ['is_boss' => $is_boss]);

        return response()->json([
            'status' => 'success',
            'message' => 'User boss status updated successfully.',
        ], 200);
    }
    /**
     * Remove a user from a company.
     */
    public function removeUserFromCompany(Request $request, $company_id)
    {
        // Validate the incoming request
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

        // Check if the authenticated user is a boss in the company
        $isBoss = $user->companies()->where('company_id', $company_id)->wherePivot('is_boss', 1)->exists();

        if (!$isBoss) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized: Only a boss can remove a user from the company.',
            ], 403);
        }

        // Ensure the user being removed is part of the company
        $userToRemove = User::find($user_id);
        $isUserInCompany = $userToRemove->companies()->where('company_id', $company_id)->exists();

        if (!$isUserInCompany) {
            return response()->json([
                'status' => 'failed',
                'message' => 'The user is not part of the specified company.',
            ], 403);
        }

        // Remove the user from the company
        $userToRemove->companies()->detach($company_id);

        return response()->json([
            'status' => 'success',
            'message' => 'User removed from the company successfully.',
        ], 200);
    }
    public function removeUserFromTeam(Request $request, $company_id, $team_id)
    {
        // Validate the incoming request
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

        // Check if the authenticated user is a boss in the company
        $isBoss = $user->companies()->where('company_id', $company_id)->wherePivot('is_boss', 1)->exists();

        if (!$isBoss) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized: Only a boss can remove a user from the company.',
            ], 403);
        }

        // Ensure the user being removed is part of the company
        $userToRemove = User::find($user_id);
        $isUserInCompany = $userToRemove->companies()->where('company_id', $company_id)->exists();
        $isUserInTeam = $userToRemove->teams()->where('team_id', $team_id)->exists();
        if (!$isUserInCompany && !$isUserInTeam) {
            return response()->json([
                'status' => 'failed',
                'message' => 'The user is not part of the specified company or team.',
            ], 403);
        }

        // Remove the user from the company
        $userToRemove->teams()->detach($team_id);

        return response()->json([
            'status' => 'success',
            'message' => 'User removed from the team successfully.',
        ], 200);
    }
    /**
     * Get all Users in a Company
     */
    public function allUsersInCompany($company_id)
    {
        $user = Auth::user();

        // Check if the authenticated user is a boss in the given company
        $isBoss = $user->companies()
            ->where('company_id', $company_id)
            ->wherePivot('is_boss', 1)
            ->exists();

        if (!$isBoss) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized: Only a boss can view all users from the company.',
            ], 403);
        }

        // Retrieve all users in the given company
        $users = User::whereHas('companies', function ($query) use ($company_id) {
            $query->where('company_id', $company_id);
        })->get();

        if ($users->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No Users found!',
            ], 200);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Users Retrieved Successfully',
            'data' => $users,
        ], 200);
    }
    /**
     * Change update user info
     */
    public function updateUserInfo(Request $request)
    {
        $user = Auth::user();

        $validate = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'profile_picture' => 'nullable|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error!',
                'errors' => $validate->errors(),
            ], 403);
        }

        if ($request->has('name')) {
            $user->name = $request->input('name');
        }

        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if it exists
            if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            // Store the new profile picture
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $profilePicturePath;
        }

        $user->save();

        $response = [
            'status' => 'success',
            'message' => 'User info updated successfully.',
            'data' => $user,
        ];
        return response()->json($response, 200);
    }

}
