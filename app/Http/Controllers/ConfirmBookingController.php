<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Listing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ConfirmBookingController extends Controller
{
    public function confirm(Request $request, $slug, $booking_id)
    {
        $listing = Listing::where('slug', $slug)->first();

        $booking = Booking::where('booking_id', $booking_id)->first();

        return view('pages.confirm-booking', [
            'listing' => $listing,
            'booking' => $booking,

        ]);
    }

    public function payment(Request $request, $booking_id)
    {
        // dd($booking_id);

        $booking = Booking::where('booking_id', $booking_id)->first();

        if ($request->input('payment_status') == "Half Paid") {
            $total_paid = $booking->total / 2;
        }

        if ($request->input('payment_status') == "Fully Paid") {
            $paid_at = Carbon::now();
        }

        Booking::where('booking_id', $booking_id)->update([
            'total_paid' => $total_paid ?? $booking->total,
            'payment_status' => $request->input('payment_status'),
            'payment_method' => 'Online Payment',
            'paid_at' => $paid_at ?? null,
            'booking_status' => 'Confirmed Reservation',
        ]);

        return Redirect::route('my-bookings')
            ->with('toast_success', 'Reservation Succesful!');
    }

    public function complete_payment(Request $request, $booking_id)
    {
        // dd($booking_id);

        $booking = Booking::where('booking_id', $booking_id)->first();

        Booking::where('booking_id', $booking_id)->update([
            'total_paid' => $booking->total,
            'payment_status' => 'Fully Paid',
            'paid_at' => Carbon::now(),
        ]);

        return Redirect::route('my-bookings')
            ->with('toast_success', 'Reservation Succesful!');
    }
}
