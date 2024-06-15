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

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->usertype = $request->has('is_admin') ? 'admin' : 'user';

        $user->save();

        return redirect()->back()->with('status', 'User updated successfully');
    }

    public function showWorkspace()
    {
        $users = User::all();
        return view('admin.user-workspace', ['users' => $users]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.workspace')->with('success', 'User deleted successfully');
    }
}
