<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactReplyMail;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
{
    /**
     * Display a listing of contact messages
     */
    public function index()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.contact-messages.index', compact('messages'));
    }

    /**
     * Display the specified contact message
     */
    public function show(ContactMessage $contactMessage)
    {
        return view('admin.contact-messages.show', compact('contactMessage'));
    }

    /**
     * Reply to a contact message
     */
    public function reply(Request $request, ContactMessage $contactMessage)
    {
        $request->validate([
            'admin_reply' => 'required|string|max:2000',
        ]);

        $contactMessage->update([
            'admin_reply' => $request->admin_reply,
            'replied_at' => now(),
        ]);

        // Send reply email
        Mail::to($contactMessage->email)->send(
            new ContactReplyMail($request->admin_reply)
        );

        return redirect()->route('admin.contact-messages.show', $contactMessage)
            ->with('success', 'Antwoord succesvol verzonden.');
    }
}
