<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    // ADD COMPANIES
    public function showAddCompanyForm()
    {
        $companies = Company::all(); // Fetch all companies
        return view('admin.admin-addcompany');
    }

    // STORE COMPANIES
    public function store(Request $request)
    {
        $company = new Company;
        $company->name = $request->name;
        $company->industry = $request->industry;
        $company->description = $request->description;
        $company->visibility = $request->visibility;
        $company->save();

        return back()->with('status', 'Company added successfully!');
    }

    // SHOW COMPANIES IN ADMIN WORKSPACE
    public function showWorkspace()
    {
        $companies = Company::all();
        return view('admin.company-workspace', ['companies' => $companies]);
    }
    
    // SHOW COMPANIES IN BOSS WORKSPACE
    public function showCompanies()
    {
        $companies = Company::all(); 

        return view('boss.companies', ['companies' => $companies]);
    }

    // DELETE COMPANY IN ADMIN
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect(route('workspace.show'))->with('success', 'Company Deleted Successfully');
    }

    // UPDATE COMPANY IN ADMIN
    public function update(Request $request, Company $company)
    {
        $company->name = $request->name;
        $company->industry = $request->industry;
        $company->description = $request->description;
        $company->visibility = $request->visibility;
        
        $company->save();

        return redirect()->back()->with('success', 'Company updated successfully!');
    }

    // SHOW BROWSE SEARCH
    // public function showBrowseSearch()
    // {
    //     $companies = Company::all(); // Fetch all companies
    //     return view('browse-search', ['companies' => $companies]); // Pass the companies to the view
    // }

    // JOIN COMPANY USING INVITE CODE
    public function joinCompany(Request $request)
    {
        $request->validate([
            'company_code' => 'required|string|size:6',
        ]);

        $company = Company::where('company_code', $request->company_code)->first();

        if (!$company) {
            return redirect()->back()->withErrors(['company_code' => 'Invalid company code.']);
        }

        $user = Auth::user();
        $user->company_id = $company->id;
        $user->save();

        return redirect()->route('company.dashboard')->with('success', 'Joined company successfully.');
    }
}

