<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Listing;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // identify time now
        $dt = new DateTime();
        $hour = $dt->format('H');
        // $dayTerm = ($hour > 17) ? "Evening" : (($hour > 12) ? "Afternoon" : "Morning");

        if ($hour > 6 && $hour <= 11) {
            $dayTerm = "Good Morning";
        } else if ($hour > 11 && $hour <= 17) {
            $dayTerm = "Good Afternoon";
        } else if ($hour > 17 && $hour <= 23) {
            $dayTerm = "Good Evening";
        } else {
            $dayTerm = "Why aren't you asleep?  Are you programming?";
        }

        $pending = Booking::where('host_id', Auth::user()->id)->where('booking_status', 'Pending Confirmation')->count();

        $confirmed = Booking::where('host_id', Auth::user()->id)->where('booking_status', 'Confirmed Reservation')->count();

        $canceled = Booking::where('host_id', Auth::user()->id)->where('booking_status', 'Canceled')->count();

        $half = Booking::where('host_id', Auth::user()->id)->where('booking_status', 'Waiting for payment approval')->count();

        $complete = Booking::where('host_id', Auth::user()->id)->where('booking_status', 'Complete')->count();

        $total = Booking::where('host_id', Auth::user()->id)->count();

        $listing_total = Listing::where('user_id', Auth::user()->id)->count();

        $listing_approved = Listing::where('user_id', Auth::user()->id)->where('listing_status', 'Approved')->count();

        $listing_pending = Listing::where('user_id', Auth::user()->id)->where('listing_status', 'Pending Approval')->count();

        $listings = Listing::where('user_id', Auth::user()->id)->latest()->limit(6)->get();


        return view('pages.host.dashboard', [
            'dayTerm' => $dayTerm,
            'listing_total' => $listing_total,
            'listing_approved' => $listing_approved,
            'listing_pending' => $listing_pending,
            'listings' => $listings,

            'pending' => $pending,
            'half' => $half,
            'confirmed' => $confirmed,
            'canceled' => $canceled,
            'complete' => $complete,
            'total' => $total,

        ]);
    }
}
