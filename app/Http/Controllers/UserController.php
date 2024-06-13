<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => $request->has('is_admin') ? 'admin' : 'user',
        ]);

        return redirect()->back()->with('status', 'User added successfully');
    }
    public function showWorkspace()
    {
        $users = User::all(); // Eager load the company relationship
        return view('admin.user-workspace', ['users' => $users]);
    }
    // ADMIN ADD USER
    public function showAddUserForm()
    {
        $users = User::all(); // Fetch all companies
        return view('admin.admin-adduser');
    }
    // DELETE USER
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.workspace')->with('success', 'User Deleted Successfully');
    }
}
