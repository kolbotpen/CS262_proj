<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filePath = $file->store('public/profiles');
            $user->profile_picture = basename($filePath);
        }

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return redirect()->route('boss.settings')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function settings(Request $request): View
    {
        return view('boss.settings', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile picture.
     */
    public function updatePicture(Request $request): RedirectResponse
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $user = Auth::user();
        $oldProfilePicture = $user->profile_picture;

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/profiles', $fileName);

            // Update user's profile picture
            $user->profile_picture = $fileName;
            $user->save();

            // Delete the old profile picture if it exists
            if ($oldProfilePicture && $oldProfilePicture !== 'assets/images/avatar.png') {
                Storage::delete('public/profiles/'.$oldProfilePicture);
            }
        }

        return redirect()->back()->with('status', 'profile-picture-updated');
    }
}
