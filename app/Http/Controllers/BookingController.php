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
            ->first();

        $get_booking_1 = Booking::where('listing_id', $listing_id)
            ->whereBetween('checkout', [$request->input('check-in'), $request->input('checkout')])
            ->first();

        // dd($get_booking, $get_booking_1);

        if ($get_booking != null || $get_booking_1 != null) {
            return Redirect::back()
                ->with('toast_error', 'Sorry Date between ' . $request->input('check-in') . ' and ' . $request->input('checkout') . 'are occupied.');
        }

        $add_guest = $request->input('adults') +
            $request->input('children') +
            $request->input('infants') +
            $request->input('pets');

        if ($add_guest > $listing->max_guest) {
            return Redirect::back()
                ->with('toast_error', 'Sorry only ' . $listing->max_guest . ' guests are allowed.');
        }

        if ($listing->availability == 'Unavailable') {
            return Redirect::back()
                ->with('toast_error', 'Sorry listing unavailable right now.');
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
