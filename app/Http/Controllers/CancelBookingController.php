<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CancelBookingController extends Controller
{
    public function destroy($booking_id)
    {
        // Softdeletes
        Booking::find($booking_id)->delete();

        return Redirect::route('my-bookings')
            ->with('toast_success', 'Booking Cancelled.');
    }
}
