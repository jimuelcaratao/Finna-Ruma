<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $listings = Listing::where('listing_status', 'Approved')->get();

        return view('pages.rentals', [
            'listings' => $listings,
        ]);
    }
}
