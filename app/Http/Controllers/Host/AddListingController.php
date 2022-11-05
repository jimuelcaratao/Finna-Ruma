<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Listing;
use App\Models\ListingAmenity;
use App\Models\ListingGallery;
use App\Models\ListingRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;


class AddListingController extends Controller
{
    protected $add_listing_others;

    public function __construct(AddListingOtherController $add_listing_others)
    {
        $this->add_listing_others = $add_listing_others;
    }

    public function index()
    {
        $categories = Category::get();
        return view('pages.host.add-listing', [
            'categories' => $categories,
        ]);
    }



    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'listing_title' => 'required|unique:listings',
            'default_photo' => 'required',
            'photo_1' => 'required',
            'photo_2' => 'required',
            'photo_3' => 'required',

            'listing_title' => 'required',
            'description' => 'required',
            'price_per_night' => 'required',
            'service_fee' => 'required',
            'location' => 'required',

        ]);

        if ($validator->fails()) {
            return Redirect::back()
                ->with('toast_error', $validator->messages()->all())
                ->withInput();
        }

        $listing =  Listing::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->input('category_id'),
            'slug' => Str::of($request->input('listing_title'))->slug('-'),

            'listing_title' => $request->input('listing_title'),
            'description' => $request->input('description'),
            'price_per_night' => $request->input('price_per_night'),
            'service_fee' => $request->input('service_fee'),

            'max_guest' => $request->input('max_guest'),
            'max_pet' => $request->input('max_pet'),

            'property_size' => $request->input('property_size'),

            'location' => $request->input('location'),
            'map_pin' => Str::replace(' ', '%20', $request->input('location')),
            'city' => $request->input('city'),
            'country' => $request->input('country'),

            'bedrooms' => $request->input('bedrooms'),
            'beds' => $request->input('beds'),
            'bed_detials' => $request->input('bed_detials'),
            'bathrooms' => $request->input('bathrooms'),

            'property_type' => $request->input('property_type'),

            'listing_status' => 'Pending Approval',
            'availability' => 'Available',

            'messenger_url' => $request->input('messenger_url'),
            'additional_notes' => $request->input('additional_notes'),
            'viewers' => 0,
        ]);

        // create gallery
        $listing_gallery = ListingGallery::create([
            'listing_id' => $listing->listing_id,
        ]);

        //create amenities
        $listing_amenity = ListingAmenity::create([
            'listing_id' => $listing->listing_id,
        ]);

        //create rules
        $listing_rule =  ListingRule::create([
            'listing_id' => $listing->listing_id,
        ]);

        $this->add_listing_others->AddAmenities($request, $listing);

        $this->add_listing_others->AddPhoto($request, $listing);

        $this->add_listing_others->AddRules($request, $listing);

        // Criteria
        $property_size = 0;
        $cost = 0;

        // property size
        if ($request->input('property_size') >= 50) {
            $property_size = 1;
        }
        if (in_array($request->input('property_size'), range(30, 49))) {
            $property_size = 2;
        }
        if (in_array($request->input('property_size'), range(20, 29))) {
            $property_size = 3;
        }
        if (in_array($request->input('property_size'), range(10, 19))) {
            $property_size = 4;
        }
        if ($request->input('property_size') <= 9) {
            $property_size = 5;
        }

        // cost
        if ($request->input('price_per_night') >= 15000) {
            $cost = 1;
        }
        if (in_array($request->input('price_per_night'), range(13000, 14999))) {
            $cost = 2;
        }
        if (in_array($request->input('price_per_night'), range(10000, 12999))) {
            $cost = 3;
        }
        if (in_array($request->input('price_per_night'), range(7000, 9999))) {
            $cost = 4;
        }
        if (in_array($request->input('price_per_night'), range(4000, 6999))) {
            $cost = 5;
        }
        if ($request->input('price_per_night') <= 3999) {
            $cost = 6;
        }

        Listing::where('listing_id', $listing->listing_id)->update([
            'room_size_score' => $property_size,
            'cost_score' => $cost,
        ]);

        return Redirect::route('host.listing')->withSuccess('Listing :' . $request->input('listing_title') . '. Created Successfully!');
    }

    public function update(Request $request, $listing_id)
    {
        $validator = Validator::make($request->all(), [
            'listing_title' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()
                ->with('toast_error', $validator->messages()->all())
                ->withInput();
        }

        $listing =  Listing::where('listing_id', $listing_id)->first();

        Listing::where('listing_id', $listing_id)->update([
            // 'user_id' => Auth::user()->id,
            'category_id' => $request->input('category_id'),
            'slug' => Str::of($request->input('listing_title'))->slug('-'),

            'availability' => $request->input('availability'),

            'listing_title' => $request->input('listing_title'),
            'description' => $request->input('description'),
            'price_per_night' => $request->input('price_per_night'),
            'service_fee' => $request->input('service_fee'),

            'max_guest' => $request->input('max_guest'),
            'max_pet' => $request->input('max_pet'),

            'property_size' => $request->input('property_size'),

            'location' => $request->input('location'),
            'map_pin' => Str::replace(' ', '%20', $request->input('location')),
            'city' => $request->input('city'),
            'country' => $request->input('country'),

            'bedrooms' => $request->input('bedrooms'),
            'beds' => $request->input('beds'),
            'bed_detials' => $request->input('bed_detials'),
            'bathrooms' => $request->input('bathrooms'),

            'property_type' => $request->input('property_type'),

            'location_score' => $request->input('location_score'),

            'messenger_url' => $request->input('messenger_url'),
            'additional_notes' => $request->input('additional_notes'),
            'viewers' => 0,
        ]);

        $this->add_listing_others->AddAmenities($request, $listing);

        $this->add_listing_others->AddPhoto($request, $listing);

        $this->add_listing_others->AddRules($request, $listing);


        // Criteria
        $property_size = 0;
        $cost = 0;

        // property size
        if ($request->input('property_size') >= 50) {
            $property_size = 1;
        }
        if (in_array($request->input('property_size'), range(30, 49))) {
            $property_size = 2;
        }
        if (in_array($request->input('property_size'), range(20, 29))) {
            $property_size = 3;
        }
        if (in_array($request->input('property_size'), range(10, 19))) {
            $property_size = 4;
        }
        if ($request->input('property_size') <= 9) {
            $property_size = 5;
        }

        // cost
        if ($request->input('price_per_night') >= 15000) {
            $cost = 1;
        }
        if (in_array($request->input('price_per_night'), range(13000, 14999))) {
            $cost = 2;
        }
        if (in_array($request->input('price_per_night'), range(10000, 12999))) {
            $cost = 3;
        }
        if (in_array($request->input('price_per_night'), range(7000, 9999))) {
            $cost = 4;
        }
        if (in_array($request->input('price_per_night'), range(4000, 6999))) {
            $cost = 5;
        }
        if ($request->input('price_per_night') <= 3999) {
            $cost = 6;
        }

        Listing::where('listing_id', $listing_id)->update([
            'room_size_score' => $property_size,
            'cost_score' => $cost,
        ]);

        return Redirect::route('host.listing')->withSuccess('Listing :' . $request->input('listing_title') . '. Updated Successfully!');
    }
}
