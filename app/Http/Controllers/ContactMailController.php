<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;

class ContactMailController extends Controller
{
    public function sendMail(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Get the form inputs
        $fullname = $request->input('fullname');
        $email = $request->input('email');
        $message = $request->input('message');

        // Send the email
        Mail::to('ourden.cs262@gmail.com')->send(new ContactUs($fullname, $email, $message));

        // Redirect back with success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
