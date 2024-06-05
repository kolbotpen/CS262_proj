<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadManager extends Controller
{
    function upload()
    {
        return view("task-insert");
    }
    public function uploadPost(Request $request)
    {
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
