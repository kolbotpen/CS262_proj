<?php


namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class UploadManager extends Controller
{
    function upload()
    {
        $users = User::all(); // Fetch all users
        return view("boss.task-insert", compact('users'));
    }

    public function uploadPost(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'assigned_to' => 'required|string|max:255',
            'assigned_email' => 'required|email',
            'priority' => 'required|string',
            'progress' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'file' => 'nullable|file|mimes:jpeg,png,jpg,pdf,docx,zip,mp4,mkv,mov,avi,mp3,wav,ogg,html,css,js,cpp,java,exe,py,txt,xml,csv,xls,xlsx,php,c,cs,sql',
        ]);

        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->assigned_to = $request->assigned_to;
        $task->assigned_email = $request->assigned_email;
        $task->priority = $request->priority;
        $task->progress = $request->progress;
        $task->user_id = $request->user_id;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('public/tasks');
            $task->file_path = $path;
        }

        $task->save();

        return redirect()->route('upload')->with('status', 'upload-success');
    }
}
