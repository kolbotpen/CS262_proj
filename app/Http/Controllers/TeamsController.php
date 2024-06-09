<?php

namespace App\Http\Controllers;
use App\Models\Team;
use Illuminate\Http\Request;

 
class TeamsController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            // 'company_id' => 'required|exists:companies,id',
        ]);

        $team = new Team;
        $team->name = $request->name;
        $team->save();

        return redirect()->back();
    }
}
