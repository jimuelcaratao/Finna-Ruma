<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Listing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RentalController extends Controller
{
    public function index()
    {
        $tableListing = Listing::all();
        $categories = Category::get();

        $listing_total = Listing::count();

        $listing_approved = Listing::where('listing_status', 'Approved')->count();

        $listing_pending = Listing::where('listing_status', 'Pending Approval')->count();

        $listing_denied = Listing::where('listing_status', 'Denied')->count();


        if ($tableListing->isEmpty()) {
            $listings = Listing::paginate(10);
        }

        if ($tableListing->isNotEmpty()) {

            // search validation
            $search = Listing::searchfilter()
                ->categoryfilter()
                ->statusfilter()
                ->first();

            $searchAdvance = Listing::searchfilter()
                ->categoryfilter()
                ->statusfilter()
                ->first();

            if ($search === null) {
                return Redirect::route('host.listing')->with('info', 'No data found in the database.');
            }

            if ($search != null) {
                // default returning
                $listings = Listing::searchfilter()
                    ->categoryfilter()
                    ->statusfilter()
                    ->latest()
                    ->paginate(10);
            }
        }
        return view('pages.admin.rentals', [
            'listings' => $listings,
            'categories' => $categories,
            'listing_total' => $listing_total,
            'listing_approved' => $listing_approved,
            'listing_pending' => $listing_pending,
            'listing_denied' => $listing_denied,
        ]);
    }

    public function edit_status(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'listing_status' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()
                ->with('toast_error', $validator->messages()->all())
                ->withInput();
        }

        Listing::where('listing_id', $request->input('listing_id'))->update([
            'approved_by' => Auth::user()->name,
            'listing_status' => $request->input('listing_status'),
            'approved_at' => Carbon::now(),
        ]);

        return Redirect::route('admin.rentals')->withSuccess('Listing Updated Successfully!');
    }
}
