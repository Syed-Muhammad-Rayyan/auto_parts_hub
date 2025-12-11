<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    //helps in sending the form for contact.
    public function send(Request $request)
    {
        //helps validate the user
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($request->only(['name', 'email', 'phone', 'subject', 'message']));

        //shows success message when the form is submitted
        return back()->with('success', '✅ Your message has been sent successfully!');
    }

    public function index()
    {
        // Return your contact page view
        return view('pages.contact');
    }
}
