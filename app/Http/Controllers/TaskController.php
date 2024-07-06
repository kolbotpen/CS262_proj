<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::with(['user:id,name', 'team:id,name'])->latest()->get();

        if ($tasks->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No tasks found!',
            ], 200);
        }

        $response = [
            'status' => 'success',
            'message' => 'Tasks retrieved successfully.',
            'data' => $tasks,
        ];

        return response()->json($response, 200);
    }

    /**
     * Display all tasks within a company and team.
     *
     * @param int $company_id
     * @param int $team_id
     * @return \Illuminate\Http\Response
     */
    public function indexByCompanyAndTeam($company_id, $team_id)
    {
        $tasks = Task::where('team_id', $team_id)
            ->with(['user:id,name', 'team:id,name'])
            ->latest()
            ->get();

        if ($tasks->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No tasks found for the specified team.',
            ], 404);
        }

        $response = [
            'status' => 'success',
            'message' => 'Tasks retrieved successfully for the team.',
            'data' => $tasks,
        ];

        return response()->json($response, 200);
    }

    public function store(Request $request, $company_id, $team_id)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'user_id' => 'required|integer|exists:users,id',
            'priority' => 'required|string|in:High,Medium,Low',
            'progress' => 'required|string|in:In-Progress,Not Started,Completed',
            'due_date' => 'required|date',
            'file_path' => 'nullable|mimes:jpeg,png,bmp,gif,svg,pdf,doc,docx,txt,zip|max:204800', // Adjust mime types as needed
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error!',
                'errors' => $validate->errors(),
            ], 403);
        }

        // Handle file upload
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/task_files', $filename);
            $fileUrl = asset('storage/task_files/' . $filename);
        } else {
            $fileUrl = null;
        }

        // Create task with file path
        $task = Task::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => $request->input('user_id'),
            'team_id' => $team_id,
            'priority' => $request->input('priority'),
            'progress' => $request->input('progress'),
            'due_date' => $request->input('due_date'),
            'file_path' => $fileUrl, // Store the URL or path to access the file
        ]);

        $response = [
            'status' => 'success',
            'message' => 'Task created successfully.',
            'data' => $task,
        ];

        return response()->json($response, 201);
    }


    /**
     * Display the specified resource.
     *
     * @param int $company_id
     * @param int $team_id
     * @param int $task_id
     * @return \Illuminate\Http\Response
     */
    public function show($company_id, $team_id, $task_id)
    {
        $task = Task::where('team_id', $team_id)
            ->where('id', $task_id)
            ->with(['user:id,name', 'team:id,name,company_id'])
            ->first();

        if (is_null($task)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Task not found!',
            ], 404);
        }
        if ($task->team->company_id != $company_id) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized access! The team does not belong to the specified company.',
            ], 403);
        }
        $user = Auth::user();
        $isBoss = $user->companies()
            ->where('company_id', $company_id)
            ->wherePivot('is_boss', true)
            ->exists();
        $isAssignedUser = $task->user_id == $user->id;

        // Checks if authenticated user is a boss of the company or assigned user
        if (!$isBoss && !$isAssignedUser) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized access!',
            ], 403);
        }

        $response = [
            'status' => 'success',
            'message' => 'Task retrieved successfully.',
            'data' => $task,
        ];

        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $company_id
     * @param int $team_id
     * @param int $task_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $company_id, $team_id, $task_id)
{
    $validate = Validator::make($request->all(), [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'user_id' => 'required|integer|exists:users,id',
        'priority' => 'required|string|in:High,Medium,Low',
        'progress' => 'required|string|in:In-Progress,Not Started,Completed',
        'due_date' => 'required|date',
        'file_path' => 'nullable|mimes:jpeg,png,bmp,gif,svg,pdf,doc,docx,txt,zip|max:204800',
    ]);

    if ($validate->fails()) {
        return response()->json([
            'status' => 'failed',
            'message' => 'Validation Error!',
            'errors' => $validate->errors(),
        ], 403);
    }

    $task = Task::where('team_id', $team_id)->find($task_id);

    if (!$task) {
        return response()->json([
            'status' => 'failed',
            'message' => 'Task not found!',
        ], 404);
    }

    // Handle file upload if a new file is provided
    if ($request->hasFile('file_path')) {
        $file = $request->file('file_path');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('public/task_files', $filename);
        $fileUrl = asset('storage/task_files/' . $filename);

        // Delete old file if needed
        // Storage::delete($task->file_path); 
    } else {
        // If no new file is uploaded, keep the existing file_path
        $fileUrl = $task->file_path;
    }

    $task->update([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'user_id' => $request->input('user_id'),
        'priority' => $request->input('priority'),
        'progress' => $request->input('progress'),
        'due_date' => $request->input('due_date'),
        'file_path' => $fileUrl,
    ]);

    $response = [
        'status' => 'success',
        'message' => 'Task updated successfully.',
        'data' => $task,
    ];

    return response()->json($response, 200);
}



    /**
     * Remove the specified resource from storage.
     *
     * @param int $company_id
     * @param int $team_id
     * @param int $task_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($company_id, $team_id, $task_id)
    {
        $task = Task::where('team_id', $team_id)->find($task_id);

        if (!$task) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Task not found!',
            ], 404);
        }

        // Check if the authenticated user is authorized to delete this task
        // For example, only the boss or the assigned user can delete tasks
        // Implement your authorization logic here

        $task->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Task deleted successfully.',
        ], 200);
    }
    /**
     * Display all tasks within a company for the boss.
     *
     * @param int $company_id
     * @return \Illuminate\Http\Response
     */
    public function tasksByCompany($company_id)
    {
        $user = Auth::user();

        // Check if the authenticated user is the boss of the company
        $isBoss = $user->companies()->where('company_id', $company_id)->wherePivot('is_boss', 1)->exists();
        
        if (!$isBoss) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized: Only the boss can view tasks within the company.',
            ], 403);
        }

        // Retrieve all tasks within the company
        $tasks = Task::whereHas('team', function ($query) use ($company_id) {
                $query->where('company_id', $company_id);
            })
            ->with(['user:id,name', 'team:id,name'])
            ->latest()
            ->get();

        if ($tasks->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No tasks found for the specified company.',
            ], 404);
        }

        $response = [
            'status' => 'success',
            'message' => 'Tasks retrieved successfully for the company.',
            'data' => $tasks,
        ];

        return response()->json($response, 200);
    }

    /**
     * Update the progress of the specified task by the assigned user.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $company_id
     * @param int $team_id
     * @param int $task_id
     * @return \Illuminate\Http\Response
     */
    public function updateProgress(Request $request, $company_id, $team_id, $task_id)
    {
        $validate = Validator::make($request->all(), [
            'progress' => 'required|string|in:In-Progress,Not Started,Completed',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error!',
                'errors' => $validate->errors(),
            ], 403);
        }

        $task = Task::where('team_id', $team_id)->find($task_id);

        if (!$task) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Task not found!',
            ], 404);
        }

        // Check if the authenticated user is authorized to update progress for this task
        // For example, only the assigned user can update progress
        // Implement your authorization logic here

        $task->update($request->only('progress'));

        $response = [
            'status' => 'success',
            'message' => 'Task progress updated successfully.',
            'data' => $task,
        ];

        return response()->json($response, 200);
    }
}
