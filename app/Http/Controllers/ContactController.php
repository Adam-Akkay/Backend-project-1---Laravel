<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Show the contact form
     */
    public function show()
    {
        return view('contact.show');
    }

    /**
     * Handle contact form submission
     */
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // Store message in database
        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        // Send email notification
        Mail::to('adam.akkay@hotmail.com')->send(
            new ContactMail($request->name, $request->email, $request->message)
        );

        return redirect()->route('contact.show')->with('success', 'Uw bericht is succesvol verzonden. We nemen zo spoedig mogelijk contact met u op.');
    }
}
