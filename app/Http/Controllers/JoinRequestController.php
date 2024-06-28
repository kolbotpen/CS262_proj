<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JoinRequest;
use App\Models\User;

class JoinRequestController extends Controller
{
    public function index()
    {
        $requests = JoinRequest::with('user')->get();
        $requestCount = $requests->count();
        $users = User::all();
        $userCount = $users->count();
        return view('admin.request', compact('requests', 'requestCount', 'users', 'userCount'));
    }

    // store in db
    public function store(Request $request)
    {
        $joinRequest = new JoinRequest();
        $joinRequest->company_id = $request->company_id;
        $joinRequest->user_id = auth()->user()->id; // Assuming users are authenticated
        $joinRequest->description = $request->description;
        $joinRequest->status = 'pending';
        $joinRequest->save();

        return back()->with('success', 'Join request sent.');
    }

    public function approve($id)
    {
        $request = JoinRequest::with('user', 'company')->findOrFail($id);
        $request->status = 'accepted';
        $request->save();
        // Add user to company as a regular member (is_boss = 0)
        $request->company->users()->attach($request->user_id, ['is_boss' => 0]);
        $request->delete();
        return back()->with('success', 'Request approved.');
    }
    public function reject($id)
    {
        $request = JoinRequest::findOrFail($id);
        $request->delete();

        return back()->with('success', 'Request rejected.');
    }

    // show in admin
    public function showWorkspace()
    {
        $requests = JoinRequest::with('user')->get();
        $requestCount = $requests->count();
        $users = User::all();
        $userCount = $users->count();
        return view('admin.request', compact('requests', 'requestCount', 'users', 'userCount'));
    }
}
