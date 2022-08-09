<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\ListingReview;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SinglePostController extends Controller
{
    public function index($slug)
    {
        $listing = Listing::where('slug', $slug)->first();

        if (Auth::check() == true) {
            $wishlist = WishList::Where('user_id',  Auth::user()->id)
                ->Where('listing_id',  $listing->listing_id)->first();
        }

        $reviews = ListingReview::where('listing_id', $listing->listing_id)
            ->limit(2)
            ->latest()
            ->get();

        return view('pages.single-post', [
            'listing' => $listing,
            'wishlist' => $wishlist ?? null,
            'reviews' => $reviews ?? null,
        ]);
    }
}
