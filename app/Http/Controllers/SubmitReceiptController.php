<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\ImageManagerStatic as Image;

class SubmitReceiptController extends Controller
{
    public function index($booking_id, $listing_id)
    {
        $booking = Booking::where('booking_id', $booking_id)->first();

        if ($booking->payment_proof != null) {
            return Redirect::route('my-bookings')
                ->with('toast_error', 'Receipt given already.');
        }
        return view('pages.submit-receipt', [
            'booking' =>  $booking,
        ]);
    }

    public function store(Request $request, $booking_id)
    {

        if ($request->hasFile('payment_proof') != null) {
            if ($request->file('payment_proof')->isValid()) {
                // create images
                $image       = $request->file('payment_proof');
                $filename    = $image->getClientOriginalName();

                $image_resize = Image::make($image);
                $image_resize->resize(1000, 1200);

                $image_resize->save(public_path('storage/media/booking/receipt_'
                    . $booking_id . '_' . $filename));

                // insert path to db 
                $char = strval($filename);
                Booking::where('booking_id', $booking_id)
                    ->update([
                        'payment_proof' => $char,
                        'booking_status' => 'Waiting for payment approval',
                    ]);

                return Redirect::route('booking', [$booking_id])
                    ->with('toast_success', 'Wait for payment approval.');
            }
        }
    }
}
