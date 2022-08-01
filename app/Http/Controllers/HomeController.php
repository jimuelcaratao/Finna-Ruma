<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $listings = Listing::where('listing_status', 'Approved')
            ->limit(6)
            ->get();

        return view('pages.home', [
            'listings' => $listings,
        ]);
    }
}
