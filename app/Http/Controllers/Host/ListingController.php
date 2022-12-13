<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Listing;
use App\Models\ListingAmenity;
use App\Models\ListingGallery;
use App\Models\ListingReview;
use App\Models\ListingRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ListingController extends Controller
{
    public function index()
    {
        $tableListing = Listing::where('user_id', Auth::user()->id)->get();
        $categories = Category::get();

        $listing_total = Listing::where('user_id', Auth::user()->id)->count();

        $listing_approved = Listing::where('user_id', Auth::user()->id)->where('listing_status', 'Approved')->count();

        $listing_pending = Listing::where('user_id', Auth::user()->id)->where('listing_status', 'Pending Approval')->count();

        $listing_denied = Listing::where('user_id', Auth::user()->id)->where('listing_status', 'Denied')->count();


        if ($tableListing->isEmpty()) {
            $listings = Listing::where('user_id', Auth::user()->id)->paginate(10);
        }

        if ($tableListing->isNotEmpty()) {

            // search validation
            $search = Listing::where('user_id', Auth::user()->id)->searchfilter()
                ->categoryfilter()
                ->statusfilter()
                ->first();

            $searchAdvance = Listing::where('user_id', Auth::user()->id)->searchfilter()
                ->categoryfilter()
                ->statusfilter()
                ->first();

            if ($search === null) {
                return Redirect::route('host.listing')->with('info', 'No data found in the database.');
            }

            if ($search != null) {
                // default returning
                $listings = Listing::where('user_id', Auth::user()->id)->searchfilter()
                    ->categoryfilter()
                    ->statusfilter()
                    ->latest()
                    ->paginate(10);
            }
        }
        return view('pages.host.my-listings', [
            'listings' => $listings,
            'categories' => $categories,
            'listing_total' => $listing_total,
            'listing_approved' => $listing_approved,
            'listing_pending' => $listing_pending,
            'listing_denied' => $listing_denied,
        ]);
    }

    public function edit($slug)
    {
        if (is_null($slug)) {
            abort(403);
        }

        $listing = Listing::where('slug', $slug)->first();

        $categories = Category::latest()->get();

        return view('pages.host.edit-listing', [
            'listing' =>   $listing,
            'categories' =>   $categories,
        ]);
    }

    public function destroy($listing_id)
    {
        if (is_null($listing_id)) {
            return Redirect::route('host.listing')->withInfo('Something went wrong. Contact Us.');
        }

        $list_reviews = ListingReview::where('listing_id', $listing_id)->first();

        if ($list_reviews != null) {
            $list_reviews->delete();
        }

        $booking = Booking::where('listing_id', $listing_id)->first();

        if ($booking != null) {
            return Redirect::route('host.listing')->withInfo('You cannot delete this while you have booking in this listing.');
        }

        // Softdeletes
        ListingRule::where('listing_id', $listing_id)->delete();
        ListingAmenity::where('listing_id', $listing_id)->delete();
        ListingGallery::where('listing_id', $listing_id)->delete();
        Listing::where('listing_id', $listing_id)->delete();

        return Redirect::route('host.listing')->withSuccess('Deleted Successfully!');
    }
}
