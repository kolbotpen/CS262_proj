<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JoinRequest;

class JoinRequestController extends Controller
{
    public function index()
    {
        $requests = JoinRequest::all();
        return view('boss.requests', compact('requests'));
    }

    public function approve($id)
    {
        $request = JoinRequest::findOrFail($id);
        $request->status = 'approved';
        $request->save();

        return redirect()->route('requests.index')->with('success', 'Request approved.');
    }

    public function reject($id)
    {
        $request = JoinRequest::findOrFail($id);
        $request->delete();

        return redirect()->route('requests.index')->with('success', 'Request rejected.');
    }
}
