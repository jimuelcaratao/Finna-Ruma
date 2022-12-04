<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BookingController extends Controller
{
    public function index()
    {
        $tablebookings = Booking::where('host_id', Auth::user()->id)->get();

        $pending = Booking::where('host_id', Auth::user()->id)->where('booking_status', 'Pending Confirmation')->count();

        $confirmed = Booking::where('host_id', Auth::user()->id)->where('booking_status', 'Confirmed Reservation')->count();

        $canceled = Booking::where('host_id', Auth::user()->id)->where('booking_status', 'Canceled')->count();

        $complete = Booking::where('host_id', Auth::user()->id)->where('booking_status', 'Complete')->count();


        if ($tablebookings->isEmpty()) {
            $bookings = Booking::paginate(10);
        }

        if ($tablebookings->isNotEmpty()) {

            // search validation
            $search = Booking::searchfilter()
                ->statusfilter()
                ->first();

            if ($search === null) {
                return Redirect::route('host.bookings')->with('info', 'No data found in the database.');
            }

            if ($search != null) {
                // default returning
                $bookings = Booking::searchfilter()
                    ->statusfilter()
                    ->latest()
                    ->paginate(10);
            }
        }
        return view('pages.admin.bookings', [
            'bookings' => $bookings,
            'pending' => $pending,
            'confirmed' => $confirmed,
            'canceled' => $canceled,
            'complete' => $complete,
        ]);
    }

    public function view_details($booking_id)
    {
        $booking = Booking::where('booking_id', $booking_id)->first();

        return view('pages.admin.booking-details', [
            'booking' => $booking,
        ]);
    }
}
