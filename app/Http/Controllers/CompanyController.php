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

    public function showWorkspace()
{
    $companies = Company::all();
    return view('admin.workspace', ['companies' => $companies]);
}
}
