<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TestBooking;
use Illuminate\Http\Request;

class TestBookingController extends Controller
{
    public function index()
    {
        $bookings = TestBooking::with('testPage')
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        
        return view('admin.test-bookings.index', compact('bookings'));
    }

    public function show($id)
    {
        $booking = TestBooking::with('testPage')->findOrFail($id);
        
        // Mark as read
        if (!$booking->is_read) {
            $booking->update([
                'is_read' => true,
                'read_at' => now(),
            ]);
        }
        
        return view('admin.test-bookings.show', compact('booking'));
    }

    public function destroy($id)
    {
        $booking = TestBooking::findOrFail($id);
        $booking->delete();
        
        return redirect()->route('admin.test-bookings.index')
            ->with('success', 'Test booking deleted successfully.');
    }
}
