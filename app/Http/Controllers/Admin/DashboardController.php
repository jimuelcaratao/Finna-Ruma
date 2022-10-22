<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Listing;
use App\Models\User;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public  function index()
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

        $pending = Booking::where('booking_status', 'Pending Confirmation')->count();

        $confirmed = Booking::where('booking_status', 'Confirmed Reservation')->count();

        $canceled = Booking::where('booking_status', 'Canceled')->count();

        $complete = Booking::where('booking_status', 'Complete')->count();

        $half = Booking::where('payment_status', 'Half Paid')->count();

        $categories = Category::count();

        $total = Booking::count();

        $listing_total = Listing::count();

        $listing_approved = Listing::where('listing_status', 'Approved')->count();

        $listing_pending = Listing::where('listing_status', 'Pending Approval')->count();

        $listings = Listing::latest()->limit(6)->get();

        $new_users = User::where('is_admin', '0')
            ->whereMonth('created_at', '=', Carbon::now()->month)
            ->count();

        $page_visits = Visit::where('visit_date', '>=', Carbon::now()->subWeeks(1))
            ->count();

        return view('pages.admin.dashboard', [
            'dayTerm' => $dayTerm,
            'listing_total' => $listing_total,
            'listing_approved' => $listing_approved,
            'listing_pending' => $listing_pending,
            'listings' => $listings,

            'new_users' => $new_users,

            'page_visits' => $page_visits,

            'pending' => $pending,
            'half' => $half,
            'confirmed' => $confirmed,
            'canceled' => $canceled,
            'complete' => $complete,
            'total' => $total,
            'categories' => $categories,
        ]);
    }
}
