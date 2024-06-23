<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JoinRequest;

class JoinRequestController extends Controller
{
    public function index()
    {
        $requests = JoinRequest::all();
        return view('boss.all-members', compact('requests'));
    }

    public function approve($id)
    {
        $request = JoinRequest::findOrFail($id);
        $request->status = 'accepted'; // Corrected from 'approved' to 'accepted'
        $request->save();
        return redirect()->route('all-members.index')->with('success', 'Request approved.');
    }

    public function reject($id)
    {
        $request = JoinRequest::findOrFail($id);
        $request->delete();

        return redirect()->route('all-members.index')->with('success', 'Request rejected.');
    }
}
