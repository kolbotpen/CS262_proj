<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    // SHOW PUBLIC COMPANIES IN BROWSE-SEARCH
    public function showBrowseSearch()
    {
        // $companies = Company::all(); // Fetch all companies
        $companies = Company::public()->get(); // Fetch only public companies
        return view('browse-search', ['companies' => $companies]); // Pass the companies to the view
    }

    // ADD COMPANIES
    public function showAddCompanyForm()
    {
        $companies = Company::with('users')->get(); // Fetch all companies
        return view('admin.admin-addcompany',['companies' => $companies]);
    }

    // STORE COMPANIES
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'industry' => 'required|string|max:255',
            'visibility' => 'required|string|in:public,private',
        ]);

        // Create a new company
        $company = new Company();
        $company->name = $request->name;
        $company->description = $request->description;
        $company->industry = $request->industry;
        $company->visibility = $request->visibility;
        $company->save();

        // Attach the company to the authenticated user and set is_boss to 1
        $user = Auth::user();
        $company->users()->attach($user->id, ['is_boss' => 1]);

        // Redirect to the companies index with a success message
        return redirect()->route('company.workspace')->with('success', 'Company created successfully.');
    }
    

    // EDIT 
    public function edit($id)
    {
        $company = Company::with('users')->findOrFail($id);
        
        return response()->json($company);
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
        $user = Auth::user();

        // Fetch companies where the user is the boss
        $createdCompanies = $user->companies()->wherePivot('is_boss', 1)->get();

        // Fetch companies where the user is not the boss
        $joinedCompanies = $user->companies()->wherePivot('is_boss', 0)->get();

        return view('boss.companies', [
            'createdCompanies' => $createdCompanies,
            'joinedCompanies' => $joinedCompanies
        ]);
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
            'is_boss' => 'array', // Expect an array of user IDs
            'is_boss.*' => 'integer|exists:users,id' // Each element must be a valid user ID
        ]);

        $company->update([
            'name' => $request->name,
            'description' => $request->description,
            'industry' => $request->industry,
            'visibility' => $request->visibility,
        ]);
        // Set all users to is_boss = 0 first
        $company->users()->update(['is_boss' => 0]);

        // Set the specified users as bosses
        if ($request->has('is_boss')) {
            foreach ($request->is_boss as $bossId) {
                $company->users()->updateExistingPivot($bossId, ['is_boss' => 1]);
            }
        }

        return redirect()->route('company.workspace')->with('success', 'Company updated successfully.');
    }
    
    // CREATE COMPANY IN BROWSE
    public function storeInBrowse(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'industry' => 'required|string|max:255',
            'visibility' => 'required|string|in:Public,Private',
        ]);

        // Create a new company
        $company = new Company();
        $company->name = $request->name;
        $company->description = $request->description;
        $company->industry = $request->industry;
        $company->visibility = $request->visibility;
        $company->save();

        // Attach the company to the authenticated user and set is_boss to 1
        $user = Auth::user();
        $company->users()->attach($user->id, ['is_boss' => 1]);

        // Redirect to the companies index with a success message
        return redirect()->route('browse-create')->with('success', 'Company added successfully.');
    }


    // JOIN COMPANY USING INVITE CODE
    public function joinCompany(Request $request)
    {
        $request->validate([
            'company_code' => 'required|string|size:6',
        ]);

        // Find the company by the provided company code
        $company = Company::where('company_code', $request->company_code)->first();

        if (!$company) {
            return redirect()->back()->withErrors(['company_code' => 'Invalid company code.']);
        }

        $user = Auth::user();
        $isMemberOrBoss = $company->users()->where('user_id', $user->id)->exists();

        if ($isMemberOrBoss) {
            return redirect()->back()->with('message', 'You are already in the company.');
        }

        // Attach the user to the company with is_boss set to 0
        $company->users()->attach($user->id, ['is_boss' => 0]);

        return redirect()->route('browse-search')->with('message', 'Successfully joined the company.');
    }


    // public function showJoinedCompanies()
    // {
    //     $user = Auth::user();

    //     // Fetch companies where the user is the boss
    //     $bossCompanies = $user->companies()->wherePivot('is_boss', 1)->get();

    //     // Fetch companies where the user is not the boss
    //     $joinedCompanies = $user->companies()->wherePivot('is_boss', 0)->get();

    //     // Merge both collections
    //     $allCompanies = $bossCompanies->merge($joinedCompanies);

    //     return view('boss.companies', ['companies' => $allCompanies]);
    // }


}

