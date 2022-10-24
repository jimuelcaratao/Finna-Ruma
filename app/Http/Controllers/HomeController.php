<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class HomeController extends Controller
{
    public function index()
    {
        // create visit
        Visit::Create([
            'ip_address' => FacadesRequest::ip(),
            'visit_date' => Carbon::now(),
        ]);

        $listings = Listing::where('listing_status', 'Approved')
            ->Orwhere('listing_status', 'Unavailable')
            ->limit(6)
            ->get();

        return view('pages.home', [
            'listings' => $listings,
        ]);
    }
}
