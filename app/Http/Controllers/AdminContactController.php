<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class AdminContactController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'pending');
        $messages = ContactMessage::where('status', $status)
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.contacts.index', compact('messages', 'status'));
    }

    public function show(ContactMessage $contact, Request $request)
    {
        $currentStatus = $request->get('status', 'pending');
        return view('admin.contacts.show', compact('contact', 'currentStatus'));
    }

    public function update(Request $request, ContactMessage $contact)
    {
        $request->validate([
            'status' => 'required|in:pending,replied',
            'reply_message' => 'nullable|string',
        ]);

        $contact->status = $request->status;
        $contact->reply_message = $request->reply_message;
        
        if ($request->status === 'replied' && !$contact->replied_at) {
            $contact->replied_at = now();
        }

        $contact->save();

        $status = $request->get('status', 'pending');
        return redirect()->route('admin.contacts.show', ['contact' => $contact->id, 'status' => $status])
            ->with('success', 'Message updated successfully.');
    }
}



