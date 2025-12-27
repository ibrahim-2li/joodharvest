<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string|max:5000',
        ]);

        Contact::create($validated);

        return redirect()->back()->with('success', app()->getLocale() === 'ar' 
            ? 'تم إرسال رسالتك بنجاح. سنتواصل معك قريباً!' 
            : 'Your message has been sent successfully. We will contact you soon!');
    }

    public function markAsRead($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update(['is_read' => true]);

        return redirect()->back()->with('success', 'Message marked as read!');
    }

    public function delete($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->back()->with('success', 'Message deleted successfully!');
 }
}
