<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class SinglePostController extends Controller
{
    public function index($slug)
    {
        $listing = Listing::where('slug', $slug)->first();

        return view('pages.single-post', [
            'listing' => $listing,
        ]);
    }
}
