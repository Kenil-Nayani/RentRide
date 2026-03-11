<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bike;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Handle the rental submission for a specific bike.
     */
    public function rent(Request $request, $id)
    {
        // Require start and end dates (Return date cannot be before pickup)
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
        ], [
            'end_date.after_or_equal' => 'The return date cannot be before the pickup date.'
        ]);

        if (!Auth::check()) {
            return redirect()->route('login')->withError('You must be logged in to book a bike.');
        }

        $user = Auth::user();

        // Check if profile is complete
        if (!$user->phone || !$user->license_number || !$user->address || !$user->city || !$user->pincode) {
            return redirect()->route('profile.edit')->withErrors(['error' => 'Please complete your profile (Phone, DL, Address) before booking a bike.']);
        }

        $bike = Bike::findOrFail($id);

        // Check if the overall status is unavailable or maintenance
        if ($bike->status !== 'Available') {
            return redirect()->back()->withErrors(['error' => 'This bike is currently ' . strtolower($bike->status) . ' and cannot be booked.']);
        }

        // Check for overlapping dates in bookings
        $hasOverlap = \App\Models\Booking::where('bike_id', $bike->id)
            ->where(function ($query) use ($request) {
                // If the requested dates overlap with any existing booking
                $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                      ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
                      ->orWhere(function ($q) use ($request) {
                          $q->where('start_date', '<=', $request->start_date)
                            ->where('end_date', '>=', $request->end_date);
                      });
            })
            ->where('status', 'Confirmed')
            ->exists();

        if ($hasOverlap) {
             return redirect()->back()->withErrors(['error' => 'This bike is already booked for the selected dates. Please choose different dates.']);
        }

        // Create the booking
        \App\Models\Booking::create([
            'user_id' => $user->id,
            'bike_id' => $bike->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => 'Confirmed'
        ]);

        return redirect()->route('bike.details', $id)
            ->with('success', 'Bike reserved successfully! Your booking is confirmed.');
    }
}
