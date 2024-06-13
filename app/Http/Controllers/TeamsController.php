<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Company;
use Illuminate\Http\Request;

class TeamsController extends Controller
{

    public function create()
    {
        $companies = Company::all(); // Fetch all companies
        return view('admin-addteam', compact('companies'));
    }
    public function showAddTeamForm()
    {
        $companies = Company::all(); // Fetch all companies
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
        $team->company_id = $request->company_id; // Assign company_id
        $team->save();

        return redirect()->back()->with('status', 'Team added successfully!');
    }

    public function showWorkspace()
    {
        $teams = Team::with('company')->get(); // Eager load the company relationship
        return view('admin.team-workspace', ['teams' => $teams]);
    }
    // DELETE TEAM IN ADMIN
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('team.workspace')->with('success', 'Team Deleted Successfully');
    }

}
