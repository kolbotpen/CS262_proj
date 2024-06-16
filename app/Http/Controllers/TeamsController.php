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
    public function showTeamAddForm()
    {
        $companies = Company::all(); // Fetch all companies
        return view('boss.team-add', compact('companies')); // Pass companies to the view
    }
    // STORING TEAM IN ADMIN 
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

        return redirect()->route('team.workspace')->with('status', 'Team added successfully!');
    }
    // STORING TEAM IN BOSS
    public function storeInBoss(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'company_id' => 'required|exists:companies,id',
        ]);

        $team = new Team;
        $team->name = $request->name;
        $team->company_id = $request->company_id;
        $team->save();

        return redirect()->route('boss.team-add')->with('status', 'Team added successfully!');
    }

    public function showWorkspace()
    {
        $teams = Team::with('company', 'users')->get();
        $companies = Company::all();
        return view('admin.team-workspace', compact('teams', 'companies'));
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

        return redirect()->route('team.workspace')->with('success', 'Team updated successfully!');
    }
    public function showAllTeams()
    {
        $teams = Team::with('users')->get(); // Fetch all teams and their associated users from the database
        return view('boss.team-all', ['teams' => $teams]); // Pass the teams to the view
    }
}
