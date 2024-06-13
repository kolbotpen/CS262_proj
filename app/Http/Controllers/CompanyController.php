<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function store(Request $request)
    {
        $company = new Company;
        $company->name = $request->name;
        $company->save();

        return redirect('/admin-addcompany')->with('status', 'Company added successfully!');
    }
    // SHOW COMPANIES IN ADMIN WORKSPACE
    public function showWorkspace()
    {
        $companies = Company::all();
        return view('admin.workspace', ['companies' => $companies]);
    }
    // SHOW COMPANIES IN BOSS WORKSPACE
    // public function showCompanies()
    // {
    //     $companies = Company::all(); 

    //     return view('boss.companies', ['companies' => $companies]);
    // }

    // DELETE COMPANY IN ADMIN
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect(route('workspace.show'))->with('success', 'Company Deleted Successfully');

    }
}   
