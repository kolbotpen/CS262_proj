<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::latest()->get();
        
        if (is_null($companies->first())) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No Company found!',
            ], 200);
        }
        $response = [
            'status' => 'success',
            'message' => 'Companies are retrieved successfully.',
            'data' => $companies,
        ];

        return response()->json($response, 200);
    }
    public function getUsersCompanies()
    {
        $user = Auth::user();
        $companies = $user->companies()->get();
    
        if ($companies->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No companies found for the authenticated user!',
            ], 200);
        }
    
        $response = [
            'status' => 'success',
            'message' => 'User\'s companies are retrieved successfully.',
            'data' => $companies,
        ];
    
        return response()->json($response, 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:250',
            'industry' => 'required|string|max:250',
            'description' => 'required|string|',
            'visibility' => 'required|string'
        ]);
        
        if($validate->fails()){  
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error!',
                'data' => $validate->errors(),
            ], 403);    
        }
        
        $company = Company::create($request->all());
        // Attach the company to the authenticated user and set is_boss to 1
        $user = Auth::user();
        $company->users()->attach($user->id, ['is_boss' => 1]);
        
        $response = [
            'status' => 'success',
            'message' => 'Company is added successfully.',
            'data' => $company,
        ];

        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $company = Company::find($id);
  
        if (is_null($company)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Company is not found!',
            ], 200);
        }

        $response = [
            'status' => 'success',
            'message' => 'Company is retrieved successfully.',
            'data' => $company,
        ];
        
        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    $validate = Validator::make($request->all(), [
        'name' => 'required|string|max:250',
        'industry' => 'required|string|max:250',
        'description' => 'required|string',
        'visibility' => 'required|string',
    ]);

    if ($validate->fails()) {
        return response()->json([
            'status' => 'failed',
            'message' => 'Validation Error!',
            'data' => $validate->errors(),
        ], 403);
    }
    
    $company = Company::find($id);

    if (is_null($company)) {
        return response()->json([
            'status' => 'failed',
            'message' => 'Company is not found!',
        ], 200);
    }

    $user = Auth::user();
    $isBoss = $user->companies()->where('company_id', $id)->wherePivot('is_boss', 1)->exists();

    if (!$isBoss) {
        return response()->json([
            'status' => 'failed',
            'message' => 'Unauthorized: Only the boss of the company can update the company.',
        ], 403);
    }

    $company->update($request->all());

    $response = [
        'status' => 'success',
        'message' => 'Company is updated successfully.',
        'data' => $company,
    ];

    return response()->json($response, 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $company = Company::find($id);
    
        if (is_null($company)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Company is not found!',
            ], 200);
        }
        $companyExists = Company::where('id', $id)->exists();
        if (!$companyExists) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized: Specified Company does not exist.',
            ], 403);
        }
        $user = Auth::user();
        $isBoss = $user->companies()->where('company_id', $id)->wherePivot('is_boss', 1)->exists();

        if (!$isBoss) {
        return response()->json([
            'status' => 'failed',
            'message' => 'Unauthorized: Only the boss of the company can delete the company.',
        ], 403);
        }

        Company::destroy($id);
        
        return response()->json([
            'status' => 'success',
            'message' => 'Company is deleted successfully.'
            ], 200);
    }



    /**
     * Add a user to a company.
     */
    public function addMemberToCompany(Request $request, $company_id)
    {
        // Validate the incoming request
        $validate = Validator::make($request->all(), [
            'user_id' => 'required|integer|exists:users,id',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error!',
                'data' => $validate->errors(),
            ], 403);
        }
        $companyExists = Company::where('id', $company_id)->exists();
        if (!$companyExists) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized: Specified Company does not exist.',
            ], 403);
        }
        $user_id = $request->input('user_id');

        $user = Auth::user();

        // Check if the authenticated user is a boss in the company
        $isBoss = $user->companies()->where('company_id', $company_id)->wherePivot('is_boss', 1)->exists();

        if (!$isBoss) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized: Only the boss can add members to the company.',
            ], 403);
        }

        $company = Company::find($company_id);

        // Ensure the user being added is not already part of the company
        if ($company->users()->where('user_id', $user_id)->exists()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'User is already a member of the company.',
            ], 403);
        }

        // Add the user to the company
        $company->users()->attach($user_id);

        return response()->json([
            'status' => 'success',
            'message' => 'User added to the company successfully.',
        ], 200);
    }
    
}