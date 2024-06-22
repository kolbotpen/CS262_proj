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
        return view('boss.task-all', compact('teams', 'company'));
    }
    public function upload()
    {
        $user = Auth::user(); // Get the currently authenticated user
        return view("boss.task-insert", compact('user'));
    }

    public function uploadPost(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|string',
            'progress' => 'required|string',
            'file' => 'nullable|file|mimes:jpeg,png,jpg,pdf,docx,zip,mp4,mkv,mov,avi,mp3,wav,ogg,html,css,js,cpp,java,exe,py,txt,xml,csv,xls,xlsx,php,c,cs,sql',
        ]);

        // Use the authenticated user's information
        $user = Auth::user(); // This replaces the User::findOrFail line

        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->assigned_to = $user->name; // Assuming 'name' is the attribute for the user's name
        $task->assigned_email = $user->email; // Assuming 'email' is the attribute for the user's email
        $task->priority = $request->priority;
        $task->progress = $request->progress;
        $task->user_id = $user->id; // Set the user_id to the authenticated user's id

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('public/tasks');
            $task->file_path = $path;
        }

        $task->save();
        return redirect()->route('upload')->with('status', 'upload-success');
    }

}
