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
        // Require start and end dates
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        $bike = Bike::findOrFail($id);

        // Here we would typically calculate the price and create a booking record in the database.
        // For now, since payment integration is pending, we simulate a successful reservation hold.

        return redirect()->route('bike.details', $id)
            ->with('success', 'Bike reserved successfully! Payment details will be sent to your email.');
    }
}
