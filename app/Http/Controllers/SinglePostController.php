<?php

namespace App\Http\Controllers;

use App\Models\Listing;
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
        return view('pages.single-post', [
            'listing' => $listing,
            'wishlist' => $wishlist ?? null,

        ]);
    }
}
