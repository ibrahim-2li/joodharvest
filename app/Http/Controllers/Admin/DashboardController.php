<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingContent;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $sections = [
            'hero' => LandingContent::getSection('hero'),
            'about' => LandingContent::getSection('about'),
            'services' => LandingContent::getSection('services'),
            'contact' => LandingContent::getSection('contact'),
        ];

        // Get contact messages
        $messages = \App\Models\Contact::latest()->get();
        $unreadCount = \App\Models\Contact::unread()->count();

        return view('admin.dashboard', compact('sections', 'messages', 'unreadCount'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'contents' => 'required|array',
            'contents.*.section' => 'required|string',
            'contents.*.key' => 'required|string',
            'contents.*.value_en' => 'nullable|string',
            'contents.*.value_ar' => 'nullable|string',
            'contents.*.type' => 'required|string',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // 5MB max
        ]);

        // Handle hero image upload if present
        if ($request->hasFile('hero_image')) {
            $file = $request->file('hero_image');
            $filename = 'hero_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            
            // Update the hero image in database
            LandingContent::updateOrCreate(
                ['section' => 'hero', 'key' => 'image'],
                [
                    'value_en' => 'uploads/' . $filename,
                    'value_ar' => 'uploads/' . $filename,
                    'type' => 'image',
                ]
            );
        }

        foreach ($validated['contents'] as $contentData) {
            // If Arabic value is empty, copy English value (useful for phone, email, etc.)
            $valueAr = $contentData['value_ar'] ?? '';
            if (empty($valueAr) && !empty($contentData['value_en'])) {
                $valueAr = $contentData['value_en'];
            }
            
            LandingContent::updateOrCreate(
                [
                    'section' => $contentData['section'],
                    'key' => $contentData['key'],
                ],
                [
                    'value_en' => $contentData['value_en'] ?? '',
                    'value_ar' => $valueAr,
                    'type' => $contentData['type'],
                ]
            );
        }

        return redirect()->route('admin.dashboard')->with('success', 'Content updated successfully!');
    }
}
