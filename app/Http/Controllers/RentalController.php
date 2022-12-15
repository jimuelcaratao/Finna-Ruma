<?php

namespace App\Http\Controllers;

use App\Models\BoardingHouse;
use App\Models\Category;
use App\Models\Listing;
use App\Models\Booking;
use App\Models\UserPreference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RentalController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        $listings = Listing::with('Booking', 'category')
            ->where('listing_status', 'Approved')
            ->Orwhere('listing_status', 'Unavailable')
            ->destinationfilter()
            ->datefilter()
            ->guestfilter()
            ->budgetfilter()
            ->propertyfilter()
            ->facilityscorefilter()
            ->targetlocationfilter()
            ->categoryfilter()
            ->housefilter()
            ->sizefilter()
            ->bedroomfilter();

        // if (Auth::check() == true) {
        //     $user_pref = UserPreference::where('user_id', Auth::user()->id)->first();
        //     if ($user_pref != null) {
        //         $orderByClause  = "CASE WHEN facility_score = '" . $user_pref->facility_score . "' THEN 0 ELSE 1 END,";
        //         $orderByClause .= "CASE WHEN cost_score = '" . $user_pref->cost_score . "' THEN 0 ELSE 1 END,";
        //         $orderByClause .= "CASE WHEN location_score = '" . $user_pref->location_score . "' THEN 0 ELSE 1 END,";
        //         $orderByClause .= "CASE WHEN room_size_score = '" . $user_pref->room_size_score . "' THEN 0 ELSE 1 END";
        //         $listings = $listings
        //             ->orderByRaw($orderByClause);
        //     }
        // }

        $categories = Category::get();

        $houses = BoardingHouse::where('status', 'Available')->get();

        $listings = $listings->get();

        if (Auth::check() == true) {
            $user_pref = UserPreference::where('user_id', Auth::user()->id)->first();
        }

        return view('pages.rentals', [
            'listings' => $listings,
            'categories' => $categories,
            'houses' => $houses,
            'user_pref' => $user_pref ?? null,
        ]);
    }

    public function add_user_preference(Request $request)
    {

        // dd($request->all());
        $validator = Validator::make($request->all(), [
            // 'cost' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::route('rentals')
                ->with('toast_error', $validator->messages()->all())
                ->withInput();
        }

        UserPreference::updateOrCreate(
            [
                'user_id' => Auth::user()->id,
            ],
            [
                'user_id' => Auth::user()->id,
                'cost_score' => $request->input('cost_score'),
                'location_score' => $request->input('location_score'),
                'facility_score' => $request->input('facility_score'),
                'room_size_score' => $request->input('room_size_score')
            ],

        );

        return Redirect::back();
    }

    public function get_user_preference(Request $request)
    {
        if (Auth::check() == true) {

            $user_prefs = UserPreference::where('user_id',  Auth::user()->id)
                ->first();

            $categories = Category::get();

            return [
                'user_prefs' => $user_prefs ?? null,
                'categories' => $categories ?? null,

            ];
        }
    }
}
