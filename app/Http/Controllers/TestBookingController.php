<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestBooking;
use Illuminate\Support\Facades\Validator;

class TestBookingController extends Controller
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
            'test_page_id' => 'nullable|exists:test_pages,id',
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

        // Save to database
        TestBooking::create($validatedData);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Your test booking request has been submitted successfully. We will contact you soon!'
            ]);
        }

        return back()->with('success', 'Your test booking request has been submitted successfully. We will contact you soon!');
    }
}
