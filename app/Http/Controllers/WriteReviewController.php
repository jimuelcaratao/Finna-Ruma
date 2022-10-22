<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\ListingReview;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class WriteReviewController extends Controller
{
    public function index($booking_id, $listing_id)
    {
        $user_has_review = ListingReview::where('user_id',  Auth::user()->id)
            ->where('listing_id', $listing_id)
            ->where('booking_id', $booking_id)
            ->first();

        if (!empty($user_has_review)) {
            return Redirect::back()->with('info', 'Opps you cannot review on same item with same transaction');
        }

        $booking = Booking::where('booking_id', $booking_id)->first();


        return view('pages.write-review', [
            'booking' =>  $booking,
        ]);
    }

    public function write_review($booking_id, $listing_id,  Request $request)
    {
        $validator = Validator::make($request->all(), [
            'stars' => 'required',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::route('write_review', [$booking_id, $listing_id])
                ->with('toast_error', $validator->messages()->all())
                ->withInput();
        }

        ListingReview::insert([
            'user_id' => Auth::user()->id,
            'listing_id' => $listing_id,
            'booking_id' => $booking_id,
            'stars' => $request->input('stars'),
            'body' => $request->input('body'),
        ]);

        $booking = Booking::where('booking_id', $booking_id)->update([
            'reviewed_at' => Carbon::now(),
        ]);

        return Redirect::route('my-bookings')->with('toast_success', 'Review added.');
    }
}
