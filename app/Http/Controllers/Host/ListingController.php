<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Listing;
use App\Models\ListingAmenity;
use App\Models\ListingGallery;
use App\Models\ListingReview;
use App\Models\ListingRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ListingController extends Controller
{
    public function index()
    {
        $tableListing = Listing::all();

        if ($tableListing->isEmpty()) {
            $listings = Listing::paginate(10);
        }

        if ($tableListing->isNotEmpty()) {

            // search validation
            $search = Listing::searchfilter()
                ->categoryfilter()
                ->first();

            $searchAdvance = Listing::searchfilter()
                ->categoryfilter()
                ->first();

            if ($search === null) {
                return Redirect::route('host.listing')->with('info', 'No "' . request()->search . '" found in the database.');
            }

            if ($search != null) {
                // default returning
                $listings = Listing::searchfilter()
                    ->categoryfilter()
                    ->latest()
                    ->paginate(10);
            }
        }
        return view('pages.host.my-listings', [
            'listings' => $listings,
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

        // Softdeletes
        ListingRule::where('listing_id', $listing_id)->delete();
        ListingAmenity::where('listing_id', $listing_id)->delete();
        ListingGallery::where('listing_id', $listing_id)->delete();
        Listing::where('listing_id', $listing_id)->delete();

        return Redirect::route('host.listing')->withSuccess('Deleted Successfully!');
    }
}
