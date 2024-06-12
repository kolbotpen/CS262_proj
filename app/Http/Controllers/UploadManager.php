<?php

namespace App\Http\Controllers;
use App\Models\Task;

use Illuminate\Http\Request;

class UploadManager extends Controller
{
    function upload()
    {
        return view("task-insert");
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
            // 'file_upload' => 'nullable|file|mimes:jpeg,png,jpg,pdf,docx,zip,'
            'file_upload' => 'nullable|file|mimes:jpeg,png,jpg,pdf,docx,zip,mp4,mkv,mov,avi,mp3,wav,ogg,html,css,js,cpp,java,exe,py,txt,xml,csv,xls,xlsx,php',

        ]);

        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->assigned_to = $request->assigned_to;
        $task->assigned_email = $request->assigned_email;
        $task->priority = $request->priority;
        $task->progress = $request->progress;
        $task->save();

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Set destination path
            $destinationPath = public_path('upload');

            // Create directory if not exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Move the file
            if ($file->move($destinationPath, $file->getClientOriginalName())) {
                // Set a session variable
                session()->flash('status', 'upload-success');
                return redirect()->back();
            } else {
                return response()->json(['message' => 'Upload Fail'], 500);
            }
        } else {
            return response()->json(['message' => 'No file uploaded.'], 400);
        }
    }

}
