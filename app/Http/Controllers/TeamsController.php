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

        // Redirect back to the same page
        return back()->with('status', 'Team added successfully!');
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
    public function showAllTeams($companyId)
    {
        $teams = Team::where('company_id', $companyId)->get();
        $company = Company::findOrFail($companyId);
        return view('boss.team-all', ['teams' => $teams, 'company' => $company]);
    }
    public function addMember(Request $request)
    {
        $request->validate([
            'team_id' => 'required|exists:teams,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $team = Team::findOrFail($request->team_id);
        $team->users()->attach($request->user_id);

        return back()->with('status', 'Member added successfully!');
    }
    public function showTeam(Team $team)
    {
        return view('boss.team', compact('team'));
    }
    public function showOneTeam($id)
    {
        $team = Team::with('users')->findOrFail($id);
        $companyId = $team->company_id; // Assuming company_id exists on the Team model
        $company = Company::findOrFail($companyId);

        return view('boss.team', compact('team', 'company'));
    }
    public function removeMember($team_id, $user_id)
    {
        $team = Team::findOrFail($team_id);
        $team->users()->detach($user_id);
    
        return back()->with('success', 'User removed from the team successfully.');
    }
}
