<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class WishListController extends Controller
{
    public function index()
    {
        $wishlists = WishList::Where('user_id', Auth::user()->id)->get();

        foreach ($wishlists as $item) {
            $get_wish = WishList::where('user_id', $item->user_id)->first();

            if ($get_wish->viewed_by_user == 0) {

                WishList::where('user_id', $get_wish->user_id)->update([
                    'viewed_by_user' => 1,
                ]);
            }
        }

        return view('pages.wishlist', [
            'wishlists' => $wishlists,
        ]);
    }

    public function add_to_wishlist($listing_id)
    {

        WishList::Create([
            'user_id' => Auth::user()->id,
            'listing_id' => $listing_id,
        ]);

        return Redirect::back()->with('toast_success', 'Added from wishlist');
    }


    public function remove_to_wishlist($listing_id)
    {
        // dd($product_code);
        $remove_wishlist =  WishList::Where('listing_id', $listing_id)
            ->Where('user_id',  Auth::user()->id)
            ->delete();

        return Redirect::back()->with('toast_success', 'Removed from wishlist');
    }
}
