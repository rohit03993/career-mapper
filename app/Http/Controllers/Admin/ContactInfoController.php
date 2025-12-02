<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    /**
     * Display contact information management page
     */
    public function index()
    {
        $contactInfo = ContactInfo::first();
        $messages = ContactMessage::orderBy('created_at', 'desc')->paginate(20);
        $unreadCount = ContactMessage::where('is_read', false)->count();
        
        return view('admin.contact.index', compact('contactInfo', 'messages', 'unreadCount'));
    }

    /**
     * Show the form for editing contact information
     */
    public function edit()
    {
        $contactInfo = ContactInfo::first();
        return view('admin.contact.edit', compact('contactInfo'));
    }

    /**
     * Update contact information
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'location' => 'nullable|string',
            'office_address' => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:255',
            'map_embed_url' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $contactInfo = ContactInfo::first();
        
        if ($contactInfo) {
            $contactInfo->update($validated);
        } else {
            ContactInfo::create($validated);
        }

        return redirect()->route('admin.contact.index')
            ->with('success', 'Contact information updated successfully!');
    }

    /**
     * Mark message as read
     */
    public function markAsRead($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->update([
            'is_read' => true,
            'read_at' => now(),
        ]);

        return back()->with('success', 'Message marked as read');
    }

    /**
     * Delete a message
     */
    public function deleteMessage($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return back()->with('success', 'Message deleted successfully');
    }
}