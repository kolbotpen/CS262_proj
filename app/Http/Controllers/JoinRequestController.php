<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JoinRequest;
use Validator;

class JoinRequestController extends Controller
{
    public function index($company_id)
    {
        $user = Auth::user();

        // Check if the authenticated user is the boss of the company
        $isBoss = $user->companies()
                       ->where('company_id', $company_id)
                       ->wherePivot('is_boss', true)
                       ->exists();

        if (!$isBoss) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized access!',
            ], 403);
        }

        $joinRequests = JoinRequest::where('company_id', $company_id)->latest()->get();

        if ($joinRequests->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No Join Request found!',
            ], 200);
        }

        $response = [
            'status' => 'success',
            'message' => 'Join Requests are retrieved successfully.',
            'data' => $joinRequests,
        ];
        return response()->json($response, 200);
    }

    public function store(Request $request, $company_id)
    {
        $validate = Validator::make($request->all(), [
            'description' => 'required|string|max:250',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error!',
                'data' => $validate->errors(),
            ], 403);
        }

        $user = Auth::user();

        // Check if a join request already exists for the given user and company
        $existingRequest = JoinRequest::where('user_id', $user->id)
                                      ->where('company_id', $company_id)
                                      ->first();

        if ($existingRequest) {
            $message = $existingRequest->status == 'pending' ? 'You have already sent a join request to this company and it is still pending.' : 'You have already sent a join request to this company and it has been processed.';

            return response()->json([
                'status' => 'failed',
                'message' => $message,
            ], 200);
        }

        $joinRequest = JoinRequest::create([
            'user_id' => $user->id,
            'company_id' => $company_id,
            'description' => $request->description,
            'status' => 'pending',
        ]);

        $response = [
            'status' => 'success',
            'message' => 'Join Request created successfully.',
            'data' => $joinRequest,
        ];

        return response()->json($response, 201);
    }

    public function show($company_id, $joinRequest_id)
    {
        $user = Auth::user();

        // Check if the authenticated user is the boss of the company
        $isBoss = $user->companies()
                       ->where('company_id', $company_id)
                       ->wherePivot('is_boss', true)
                       ->exists();

        if (!$isBoss) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized access!',
            ], 403);
        }

        $joinRequest = JoinRequest::find($joinRequest_id);

        if (is_null($joinRequest)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Join Request is not found!',
            ]);
        }

        $response = [
            'status' => 'success',
            'message' => 'Join Request is retrieved successfully.',
            'data' => $joinRequest,
        ];
        return response()->json($response, 200);
    }

    public function update(Request $request, $company_id, $joinRequest_id)
    {
        $validate = Validator::make($request->all(), [
            'description' => 'required|string|max:250',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error!',
                'data' => $validate->errors(),
            ], 403);
        }

        $joinRequest = JoinRequest::find($joinRequest_id);

        if (is_null($joinRequest)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Join Request is not found!',
            ], 404);
        }

        // Check if the authenticated user is the creator of the join request
        $user = Auth::user();
        if ($user->id !== $joinRequest->user_id) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized access!',
            ], 403);
        }

        $joinRequest->update([
            'description' => $request->description,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Join Request updated successfully.',
            'data' => $joinRequest,
        ], 200);
    }

    public function destroy($company_id, $joinRequest_id)
    {
        $joinRequest = JoinRequest::find($joinRequest_id);

        if (is_null($joinRequest)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Join Request is not found!',
            ]);
        }

        // Check if the authenticated user is the creator of the join request
        $user = Auth::user();
        if ($user->id !== $joinRequest->user_id) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized access!',
            ], 403);
        }

        $joinRequest->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Join Request deleted successfully.',
        ], 200);
    }
    public function handleRequest(Request $request, $company_id, $joinRequest_id)
    {
        $validate = Validator::make($request->all(), [
            'status' => 'required|in:accepted,rejected',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error!',
                'data' => $validate->errors(),
            ], 403);
        }

        $joinRequest = JoinRequest::find($joinRequest_id);

        if (is_null($joinRequest)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Join Request is not found!',
            ], 404);
        }

        // Check if the authenticated user is the boss of the company
        $user = Auth::user();
        $isBoss = $user->companies()
                       ->where('company_id', $company_id)
                       ->wherePivot('is_boss', true)
                       ->exists();

        if (!$isBoss) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized access!',
            ], 403);
        }

        // Check if the user is already associated with the company
        if ($joinRequest->user->companies()->where('company_id', $company_id)->exists()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'User is already associated with the company!',
            ], 400);
        }

        // Update the status of the join request
        $joinRequest->status = $request->status;
        $joinRequest->save();

        // If status is 'accepted', attach the user who made the request to the company
        if ($request->status === 'accepted') {
            // Attach the user to the company through the relationship
            $joinRequest->user->companies()->attach($company_id, ['is_boss' => false]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Join Request status updated successfully.',
            'data' => $joinRequest,
        ], 200);
    }
}
