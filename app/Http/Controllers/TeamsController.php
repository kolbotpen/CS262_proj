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
    
    // STORING TEAM
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

        return redirect()->back()->with('status', 'Team added successfully!');
    }

    public function showWorkspace()
    {
        $teams = Team::with('company')->get();
        $companies = Company::all();
        return view('admin.team-workspace', ['teams' => $teams],['companies' => $companies]);
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

        return redirect()->back()->with('success', 'Team updated successfully!');
    }
}
