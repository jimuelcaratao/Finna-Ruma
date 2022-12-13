<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Models\BoardingHouse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class BoardingHouseController extends Controller
{
    public function index()
    {
        $tableListing = BoardingHouse::where('user_id', Auth::user()->id)->get();

        $listing_total = BoardingHouse::where('user_id', Auth::user()->id)->count();

        $listing_available = BoardingHouse::where('user_id', Auth::user()->id)->where('status', 'Available')->count();

        $listing_unavailable = BoardingHouse::where('user_id', Auth::user()->id)->where('status', 'Unavailable')->count();

        if ($tableListing->isEmpty()) {
            $listings = BoardingHouse::where('user_id', Auth::user()->id)->paginate(10);
        }

        if ($tableListing->isNotEmpty()) {

            // search validation
            $search = BoardingHouse::where('user_id', Auth::user()->id)
                ->statusfilter()
                ->first();

            $searchAdvance = BoardingHouse::where('user_id', Auth::user()->id)
                ->statusfilter()
                ->first();

            if ($search === null) {
                return BoardingHouse::route('host.boarding-house')->with('info', 'No data found in the database.');
            }

            if ($search != null) {
                // default returning
                $listings = BoardingHouse::where('user_id', Auth::user()->id)
                    ->statusfilter()
                    ->latest()
                    ->paginate(10);
            }
        }
        return view('pages.host.boarding-houses', [
            'listings' => $listings,
            'listing_total' => $listing_total,
            'listing_available' => $listing_available,
            'listing_unavailable' => $listing_unavailable,
        ]);
    }

    public function create()
    {
        return view('pages.host.add-boarding-house', []);
    }

    public function edit($slug)
    {
        $house = BoardingHouse::where('slug', $slug)->first();

        return view('pages.host.edit-boarding-house', [
            'house' => $house,
        ]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:boarding_houses',
            'description' => 'required',
            'cover' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()
                ->with('toast_error', $validator->messages()->all())
                ->withInput();
        }

        $boarding =  BoardingHouse::create([
            'user_id' => Auth::user()->id,
            'slug' => Str::of($request->input('title'))->slug('-'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ]);

        // photos
        if ($request->hasFile('cover') != null) {
            if ($request->file('cover')->isValid()) {
                // create images
                $image       = $request->file('cover');
                $filename    = $image->getClientOriginalName();
                $boarding_house_id =  $boarding->boarding_house_id;

                $image_resize = Image::make($image);
                $image_resize->resize(1200, 600);

                $image_resize->save(public_path('storage/media/boarding_house/cover_'
                    . $boarding_house_id . '_' . $filename));

                // insert path to db 
                $char = strval($filename);
                BoardingHouse::where('boarding_house_id', $boarding_house_id)
                    ->update([
                        'cover' => $char,
                    ]);
            }
        }

        return Redirect::route('host.boarding-house')->withSuccess('Created Successfully!');
    }

    public function update(Request $request, $boarding_house_id)
    {
        // dd($request->all(), $boarding_house_id);
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()
                ->with('toast_error', $validator->messages()->all())
                ->withInput();
        }

        $boarding =  BoardingHouse::where('boarding_house_id', $boarding_house_id)->update([
            'slug' => Str::of($request->input('title'))->slug('-'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ]);

        // photos
        if ($request->hasFile('cover') != null) {
            if ($request->file('cover')->isValid()) {
                // create images
                $image       = $request->file('cover');
                $filename    = $image->getClientOriginalName();
                $boarding_house_id =  $boarding_house_id;

                $image_resize = Image::make($image);
                $image_resize->resize(1200, 600);

                $image_resize->save(public_path('storage/media/boarding_house/cover_'
                    . $boarding_house_id . '_' . $filename));

                // insert path to db 
                $char = strval($filename);
                BoardingHouse::where('boarding_house_id', $boarding_house_id)
                    ->update([
                        'cover' => $char,
                    ]);
            }
        }

        return Redirect::route('host.boarding-house')->withSuccess('Updated Successfully!');
    }
}
