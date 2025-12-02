<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestBooking;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'contact_number' => [
                'required',
                'string',
                'regex:/^\+91[6-9]\d{9}$/',
            ],
            'email' => 'required|email|max:255',
            'message' => 'required|string',
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

        // Save to test_bookings table (test_page_id will be null for general contact)
        TestBooking::create([
            'name' => $validatedData['name'],
            'contact_number' => $validatedData['contact_number'],
            'email' => $validatedData['email'],
            'message' => $validatedData['message'],
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