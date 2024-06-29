<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Team;
use App\Models\Company;

class HomeController extends Controller
{

    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            if ($usertype == 'user') {
                $teams = Team::all();
                return view('landing', ['teams' => $teams]);
            } else if ($usertype == 'admin') {
                $totalCompanies = Company::count();
                $totalTeams = Team::count();
                $totalUsers = User::count();

                return view('admin.adminhome', [
                    'totalCompanies' => $totalCompanies,
                    'totalTeams' => $totalTeams,
                    'totalUsers' => $totalUsers,
                ]);
            } else {
                return redirect()->back();
            }
        }
    }

    public function post()
    {
        return view('post');
    }

    public function workspace()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $teams = Team::all();
            if ($usertype == 'user') {
                return view('landing', ['teams' => $teams]);
            }
            else {
             return redirect()->back();
            }
        }
    }

    public function edit()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {
                return view('landing');
            } else if ($usertype == 'admin') {
                return view('admin.edit');
            } else {
                return redirect()->back();
            }
        }
    }
    public function edituser()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {
                return view('landing');
            } else if ($usertype == 'admin') {
                return view('admin.edituser');
            } else {
                return redirect()->back();
            }
        }
    }
    public function setting()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {
                return view('landing');
            } else if ($usertype == 'admin') {
                return view('admin.setting');
            } else {
                return redirect()->back();
            }
        }
    }
    public function showCompanies()
    {
        $teams = Team::all(); // Retrieve all teams from the database
        $companies = Company::all(); // Retrieve all companies from the database

        return view('boss.companies', ['teams' => $teams, 'companies' => $companies]); // Pass the teams and companies to the view
    }

}
