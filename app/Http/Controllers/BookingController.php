<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{

    public function index($booking_id)
    {
        $booking = Booking::where('booking_id', $booking_id)->first();

        return view('pages.booking', [
            'booking' => $booking,
        ]);
    }

    public function my_bookings()
    {
        $bookings = Booking::where('user_id', Auth::user()->id)->latest()->get();

        return view('pages.my-bookings', [
            'bookings' => $bookings,
        ]);
    }

    public function store(Request $request, $listing_id)
    {
        $listing = Listing::where('listing_id', $listing_id)->first();

        $validator = Validator::make($request->all(), [
            'check-in' => 'required',
            'checkout' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()
                ->with('toast_error', $validator->messages()->all())
                ->withInput();
        }

        $get_booking = Booking::where('listing_id', $listing_id)
            ->whereBetween('check_in', [$request->input('check-in'), $request->input('checkout')])
            ->orWhereBetween('checkout', [$request->input('check-in'), $request->input('checkout')])
            ->first();

        if ($get_booking != null) {
            return Redirect::back()
                ->with('toast_error', 'Sorry Date between ' . $request->input('check-in') . ' and ' . $request->input('checkout') . 'are occupied.');
        }

        $booking =  Booking::create([
            'user_id' => Auth::user()->id,
            'host_id' => $listing->user->id,
            'listing_id' => $listing_id,

            'check_in' => $request->input('check-in'),
            'checkout' => $request->input('checkout'),
            'days' => $request->input('days'),

            'adults' => $request->input('adults'),
            'children' => $request->input('children'),
            'infants' => $request->input('infants'),
            'pets' => $request->input('pets'),

            'service_fee' => $request->input('service_fee'),
            'price_per_night' => $request->input('price_night'),
            'pending_total' => $request->input('pending-total'),
            'total' => $request->input('total'),

            'booking_status' => 'Pending Confirmation',
        ]);

        return Redirect::route('confirm-booking', [$listing->slug, $booking->booking_id])
            ->with('toast_success', 'Confirm reservation.');
    }
}
