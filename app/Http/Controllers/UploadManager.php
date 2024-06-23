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
        $tasks = Task::whereIn('team_id', $teams->pluck('id'))->get(); // This line is correct but ensure it's used properly in the view

        // Ensure the view differentiates tasks by team correctly
        return view('boss.task-all', compact('teams', 'company', 'tasks'));
    }
    public function upload(Request $request)
    {
        $user = Auth::user(); // Get the currently authenticated user
        $teams = $user->teams;
        $userIds = [];
        foreach ($teams as $team) {
            $teamUserIds = $team->users->pluck('id')->toArray();
            $userIds = array_merge($userIds, $teamUserIds);
        }


        $userIds = array_unique($userIds);
        $users = User::whereIn('id', $userIds)->get();
        $teamId = $request->query('team_id'); // Retrieve the team ID from the query parameters
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
        $task->assigned_to = $assignedUser->name;
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
        return redirect()->route('upload')->with('status', 'upload-success');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->back()->with('success', 'Task deleted successfully.');
    }

}
