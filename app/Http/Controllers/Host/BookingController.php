<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            $bookings = Booking::where('host_id', Auth::user()->id)->paginate(10);
        }

        if ($tablebookings->isNotEmpty()) {

            // search validation
            $search = Booking::where('host_id', Auth::user()->id)->searchfilter()
                ->statusfilter()
                ->first();

            if ($search === null) {
                return Redirect::route('host.bookings')->with('info', 'No data found in the database.');
            }

            if ($search != null) {
                // default returning
                $bookings = Booking::where('host_id', Auth::user()->id)->searchfilter()
                    ->statusfilter()
                    ->latest()
                    ->paginate(10);
            }
        }

        return view('pages.host.bookings', [
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

        return view('pages.host.booking-details', [
            'booking' => $booking,
        ]);
    }

    public function approve_receipt(Request $request)
    {
        // dd($request->all());
        $user = User::where('email', Auth::user()->email)->first();

        if ($user->password == null) {
            return Redirect::back()->with('info', 'Opps you have currently no password.');
        }

        if (Hash::check($request->input('password'), $user->password)) {

            if (!empty($request->input('payment_status'))) {
                $booking = Booking::where('booking_id', $request->input('booking_id'))->first();
                Booking::where('booking_id', $request->input('booking_id'))
                    ->update([
                        'booking_status' => 'Confirmed Reservation',
                        'payment_approved_at' => Carbon::now(),
                        'paid_at' => Carbon::now(),
                    ]);

                return Redirect::back()->with('success', 'Payment Successfully updated.');
            }
        } else {
            return Redirect::back()->with('info', 'Sorry Wrong credentials.');
        }
    }

    public function update_payment(Request $request, $booking_id)
    {

        $user = User::where('email', Auth::user()->email)->first();

        if ($user->password == null) {
            return Redirect::back()->with('info', 'Opps you have currently no password.');
        }

        if (Hash::check($request->input('password'), $user->password)) {

            if (!empty($request->input('payment_status'))) {
                $booking = Booking::where('booking_id', $booking_id)->first();
                Booking::where('booking_id', $booking_id)
                    ->update([
                        'total_paid' => $booking->total,
                        'payment_status' => $request->input('payment_status'),
                        'paid_at' => Carbon::now(),
                    ]);

                return Redirect::back()->with('success', 'Payment Successfully updated.');
            }
        } else {
            return Redirect::back()->with('info', 'Sorry Wrong credentials.');
        }
    }

    public function complete_booking($booking_id)
    {
        if (is_null($booking_id)) {
            return Redirect::route('host.bookings')->withInfo('Something went wrong. Contact Us.');
        }

        $booking = Booking::where('booking_id', $booking_id)->first();

        if ($booking != null) {
            $booking->update([
                'booking_status' => 'Complete',
                'completed_at' => Carbon::now(),
            ]);
        }

        return Redirect::route('host.bookings')->withSuccess('Listing Complete!');
    }

    public function host_status(Request $request)
    {
        Booking::where('booking_id', $request->booking_id_edit)
            ->update([
                'host_status' => $request->input('host_status_edit'),
            ]);

        return Redirect::route('host.bookings')->withSuccess('Host status updated!');
    }


    public function archive($booking_id)
    {
        if (is_null($booking_id)) {
            return Redirect::route('host.bookings')->withInfo('Something went wrong. Contact Us.');
        }

        $booking = Booking::where('booking_id', $booking_id)->first();

        if ($booking != null) {
            $booking->update([
                'deleted_at' => Carbon::now(),
            ]);
        }

        return Redirect::route('host.bookings')->withSuccess('Listing Archived!');
    }
}
