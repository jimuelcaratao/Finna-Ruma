<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Listing;
use App\Models\Booking;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        $listings = Listing::with('Booking', 'category')->where('listing_status', 'Approved')
            ->destinationfilter()
            ->datefilter()
            ->guestfilter()
            ->budgetfilter()
            ->propertyfilter()
            ->categoryfilter()
            ->sizefilter()
            ->bedroomfilter()
            ->get();

        $categories = Category::get();

        return view('pages.rentals', [
            'listings' => $listings,
            'categories' => $categories,
        ]);
    }
}
