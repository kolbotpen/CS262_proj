<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

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
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'industry' => 'nullable|string',
            'visibility' => 'required|in:public,private',
        ]);

        Company::create([
            'name' => $request->name,
            'description' => $request->description,
            'industry' => $request->industry,
            'visibility' => $request->visibility,
        ]);

        return redirect()->route('company.workspace')->with('success', 'Company added successfully.');
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
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'industry' => 'nullable|string',
            'visibility' => 'required|in:public,private',
        ]);

        $company->update([
            'name' => $request->name,
            'description' => $request->description,
            'industry' => $request->industry,
            'visibility' => $request->visibility,
        ]);

        return redirect()->route('company-workspace')->with('success', 'Company updated successfully.');
    }
}
