<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Mailtrap\Config;
use Mailtrap\MailtrapClient;
use Mailtrap\EmailHeader\CategoryHeader;
use Mailtrap\Helper\ResponseHelper;

class ContactMailController extends Controller
{
    protected $mailtrap;

    public function __construct()
    {
        $apiKey = env('MAILTRAP_API_KEY'); // Fetching the API key from the .env file
        $this->mailtrap = new MailtrapClient(new Config($apiKey));
    }

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

        // Prepare and send the email
        try {
            $email = (new Email())
                ->from(new Address($email, $fullname))
                ->to(new Address('ourden.cs262@gmail.com'))
                ->subject('Contact Us | Message from ' . $fullname)
                ->text($message);

            $email->getHeaders()->add(new CategoryHeader('Contact Form Submission'));

            $response = $this->mailtrap->sending()->emails()->send($email);

            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            // Handle email sending failure
            return redirect()->back()->with('error', 'Failed to send email: ' . $e->getMessage());
        }
    }
}
