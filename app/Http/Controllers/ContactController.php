<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestBooking;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Ensure contact_number has +91 prefix
        $contactNumber = $request->input('contact_number', '');
        if (!empty($contactNumber) && !str_starts_with($contactNumber, '+91')) {
            // Remove any existing +91 or +91 prefix
            $contactNumber = preg_replace('/^\+?91\s*/', '', $contactNumber);
            // Add +91 prefix
            $contactNumber = '+91' . $contactNumber;
            $request->merge(['contact_number' => $contactNumber]);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'contact_number' => [
                'required',
                'string',
                'regex:/^\+91[6-9]\d{9}$/',
            ],
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'grade_level' => 'nullable|string|max:255',
            'additional_message' => 'nullable|string',
        ], [
            'contact_number.regex' => 'Contact number must be in format +91 followed by 10 digits starting with 6-9.',
            'contact_number.required' => 'Contact number is required.',
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }
            return back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();

        // Combine message with additional info if provided
        $fullMessage = $validatedData['message'];
        if (!empty($validatedData['grade_level'])) {
            $fullMessage .= "\n\nGrade Level: " . ucfirst(str_replace('-', ' ', $validatedData['grade_level']));
        }
        if (!empty($validatedData['additional_message'])) {
            $fullMessage .= "\n\nAdditional Message: " . $validatedData['additional_message'];
        }

        // Save to test_bookings table (test_page_id will be null for general contact)
        TestBooking::create([
            'name' => $validatedData['name'],
            'contact_number' => $validatedData['contact_number'],
            'email' => $validatedData['email'],
            'message' => $fullMessage,
            'test_page_id' => null, // General contact form, not tied to a specific test
        ]);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Your message has been sent. Thank you!'
            ]);
        }

        return back()->with('success', 'Your message has been sent. Thank you!');
    }
}