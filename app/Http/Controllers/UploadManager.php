<?php


namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Team;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadManager extends Controller
{
    public function tasksForCompany(Company $company)
    {
        $teams = Team::where('company_id', $company->id)->get();
        $tasks = Task::whereIn('team_id', $teams->pluck('id'))->get();
        // foreach ($tasks as $task) {
        //     // $task->team = $task->team;
        //     $user = $task->assignedUser;
        //     dd($user->email);
        // }
        // Ensure the view differentiates tasks by team correctly
        return view('boss.task-all', compact('teams', 'company', 'tasks'));
    }
    public function upload(Request $request)
    {
        $user = Auth::user(); // Get the currently authenticated user
        $teamId = $request->query('team_id'); // Retrieve the team ID from the query parameters

        // Fetch the specified team and its company
        $team = Team::with('company')->findOrFail($teamId);

        // Fetch users belonging to the specified team
        $users = User::whereHas('teams', function ($query) use ($teamId) {
            $query->where('team_id', $teamId);
        })->get();

        return view("boss.task-insert", compact('user', 'users', 'teamId'));
    }
    
    public function uploadPost(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|string',
            'progress' => 'required|string',
            'assigned_to' => 'required|exists:users,id',
            'due_date' => 'nullable|date',
            'team_id' => 'required|exists:teams,id', // Validate team_id
            'file' => 'nullable|file|mimes:jpeg,png,jpg,pdf,docx,zip,mp4,mkv,mov,avi,mp3,wav,ogg,html,css,js,cpp,java,exe,py,txt,xml,csv,xls,xlsx,php,c,cs,sql',
        ]);
        // Find the user to whom the task is assigned
        $assignedUser = User::findOrFail($request->assigned_to);
        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->assigned_to = $request->assigned_to;
        $task->assigned_email = $assignedUser->email;
        $task->priority = $request->priority;
        $task->progress = $request->progress;
        $task->due_date = $request->due_date;
        $task->user_id = $assignedUser->id;
        $task->team_id = $request->team_id; // Save the team_id from the request

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('public/tasks');
            $task->file_path = $path;
        }
        $task->save();
        return redirect()->route('upload', ['team_id' => $request->team_id])->with('status', 'upload-success');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->back()->with('success', 'Task deleted successfully.');
    }

    // Method to view a task's details
    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('boss.task-details', compact('task'));
    }

    // Method to edit a task's details
    public function edit(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $teamId = $request->query('team_id', $task->team_id);

        // Fetch users belonging to the team
        $users = User::whereHas('teams', function ($query) use ($teamId) {
            $query->where('team_id', $teamId);
        })->get();

        if ($request->isMethod('PUT')) {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'assigned_to' => 'required|exists:users,id',
                'assigned_email' => 'required|email',
                'priority' => 'required|string',
                'progress' => 'required|string',
                'due_date' => 'required|date',
                'file' => 'nullable|file|mimes:jpeg,png,jpg,pdf,docx,zip,mp4,mkv,mov,avi,mp3,wav,ogg,html,css,js,cpp,java,exe,py,txt,xml,csv,xls,xlsx,php,c,cs,sql',
            ]);

            $task->update($validatedData);
            $task->assigned_email = $request->input('assigned_email');

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $path = $file->store('public/tasks');
                $task->file_path = $path;
            }

            $task->save();
            return redirect()->back()->with('success', 'Task updated successfully.');
        }

        return view('boss.task-details-edit', compact('task', 'users', 'teamId'));
    }


    public function showWorkspace()
    {
        $tasks = Task::with(['team', 'user'])->get();

        return view('admin.task-workspace', compact('tasks'));
    }
    public function tasksForTeam(Team $team)
    {
        $tasks = Task::where('team_id', $team->id)->get();
        return view('boss.task', compact('tasks', 'team'));
    }


    public function showCalendar(Request $request)
    {
        $user = $request->user();  // Get the current authenticated user
        $companies = $user->companies;  // Assuming the User model has a 'companies' relationship

        $tasks = Task::whereHas('team', function($query) use ($companies) {
            $query->whereIn('company_id', $companies->pluck('id'));
        })->with('assignedUser')->get();

        return view('boss.calendar', compact('tasks', 'companies'));
    }

}
