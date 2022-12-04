<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\ListingAmenity;
use App\Models\ListingGallery;
use App\Models\ListingRule;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;


class AddListingOtherController extends Controller
{
    public function AddPhoto($request, $listing)
    {
        // photos
        if ($request->hasFile('default_photo') != null) {
            if ($request->file('default_photo')->isValid()) {
                // create images
                $image       = $request->file('default_photo');
                $filename    = $image->getClientOriginalName();
                $listing_id =  $listing->listing_id;

                $image_resize = Image::make($image);
                $image_resize->resize(1200, 600);

                $image_resize->save(public_path('storage/media/listing/cover_'
                    . $listing_id . '_' . $filename));

                // insert path to db 
                $char = strval($filename);
                Listing::where('listing_id', $listing_id)
                    ->update([
                        'default_photo' => $char,
                    ]);
            }
        }

        if ($request->hasFile('gcash_qr') != null) {
            if ($request->file('gcash_qr')->isValid()) {
                // create images
                $image       = $request->file('gcash_qr');
                $filename    = $image->getClientOriginalName();
                $listing_id =  $listing->listing_id;

                $image_resize = Image::make($image);
                $image_resize->resize(1000, 800);

                $image_resize->save(public_path('storage/media/listing/gcash_'
                    . $listing_id . '_' . $filename));

                // insert path to db 
                $char = strval($filename);
                Listing::where('listing_id', $listing_id)
                    ->update([
                        'gcash_qr' => $char,
                    ]);
            }
        }


        if ($request->hasFile('photo_1') != null) {
            if ($request->file('photo_1')->isValid()) {
                // create images
                $image       = $request->file('photo_1');
                $filename    = $image->getClientOriginalName();
                $listing_id =  $listing->listing_id;

                $image_resize = Image::make($image);
                $image_resize->resize(1200, 600);

                $image_resize->save(public_path('storage/media/listing/photo_1_'
                    . $listing_id . '_' . $filename));

                // insert path to db 
                $char = strval($filename);
                ListingGallery::where('listing_id', $listing_id)
                    ->update([
                        'photo_1' => $char,
                    ]);
            }
        }

        if ($request->hasFile('photo_2') != null) {
            if ($request->file('photo_2')->isValid()) {
                // create images
                $image       = $request->file('photo_2');
                $filename    = $image->getClientOriginalName();
                $listing_id =  $listing->listing_id;

                $image_resize = Image::make($image);
                $image_resize->resize(1200, 600);

                $image_resize->save(public_path('storage/media/listing/photo_2_'
                    . $listing_id . '_' . $filename));

                // insert path to db 
                $char = strval($filename);
                ListingGallery::where('listing_id', $listing_id)
                    ->update([
                        'photo_2' => $char,
                    ]);
            }
        }

        if ($request->hasFile('photo_3') != null) {
            if ($request->file('photo_3')->isValid()) {
                // create images
                $image       = $request->file('photo_3');
                $filename    = $image->getClientOriginalName();
                $listing_id =  $listing->listing_id;

                $image_resize = Image::make($image);
                $image_resize->resize(1200, 600);

                $image_resize->save(public_path('storage/media/listing/photo_3_'
                    . $listing_id . '_' . $filename));

                // insert path to db 
                $char = strval($filename);
                ListingGallery::where('listing_id', $listing_id)
                    ->update([
                        'photo_3' => $char,
                    ]);
            }
        }

        if ($request->hasFile('photo_4') != null) {
            if ($request->file('photo_4')->isValid()) {
                // create images
                $image       = $request->file('photo_4');
                $filename    = $image->getClientOriginalName();
                $listing_id =  $listing->listing_id;

                $image_resize = Image::make($image);
                $image_resize->resize(1200, 600);

                $image_resize->save(public_path('storage/media/listing/photo_4_'
                    . $listing_id . '_' . $filename));

                // insert path to db 
                $char = strval($filename);
                ListingGallery::where('listing_id', $listing_id)
                    ->update([
                        'photo_4' => $char,
                    ]);
            }
        }

        if ($request->hasFile('photo_5') != null) {
            if ($request->file('photo_5')->isValid()) {
                // create images
                $image       = $request->file('photo_5');
                $filename    = $image->getClientOriginalName();
                $listing_id =  $listing->listing_id;

                $image_resize = Image::make($image);
                $image_resize->resize(1200, 600);

                $image_resize->save(public_path('storage/media/listing/photo_5_'
                    . $listing_id . '_' . $filename));

                // insert path to db 
                $char = strval($filename);
                ListingGallery::where('listing_id', $listing_id)
                    ->update([
                        'photo_5' => $char,
                    ]);
            }
        }

        if ($request->hasFile('photo_6') != null) {
            if ($request->file('photo_6')->isValid()) {
                // create images
                $image       = $request->file('photo_6');
                $filename    = $image->getClientOriginalName();
                $listing_id =  $listing->listing_id;

                $image_resize = Image::make($image);
                $image_resize->resize(1200, 600);

                $image_resize->save(public_path('storage/media/listing/photo_6_'
                    . $listing_id . '_' . $filename));

                // insert path to db 
                $char = strval($filename);
                ListingGallery::where('listing_id', $listing_id)
                    ->update([
                        'photo_6' => $char,
                    ]);
            }
        }
    }

    public function AddAmenities($request, $listing)
    {


        ListingAmenity::where('listing_id', $listing->listing_id)->update([
            'wifi' => $request->has('wifi') ? '1' : '0',
            'washer' => $request->has('washer') ? '1' : '0',
            'air_conditioning' => $request->has('air_conditioning') ? '1' : '0',
            'heating' => $request->has('heating') ? '1' : '0',
            'tv' => $request->has('tv') ? '1' : '0',
            'iron' => $request->has('iron') ? '1' : '0',
            'kitchen' => $request->has('kitchen') ? '1' : '0',
            'dryer' => $request->has('dryer') ? '1' : '0',
            'dedicated_workspace' => $request->has('dedicated_workspace') ? '1' : '0',
            'hair_dryer' => $request->has('hair_dryer') ? '1' : '0',

            'pool' => $request->has('pool') ? '1' : '0',
            'free_parking' => $request->has('free_parking') ? '1' : '0',
            'crib' => $request->has('crib') ? '1' : '0',
            'grill' => $request->has('grill') ? '1' : '0',
            'gym' => $request->has('gym') ? '1' : '0',
            'smoking_allowed' => $request->has('smoking_allowed') ? '1' : '0',
            'breakfast' => $request->has('breakfast') ? '1' : '0',

            'smoke_alarm' => $request->has('smoke_alarm') ? '1' : '0',
            'carbon_monoxide_alarm' => $request->has('carbon_monoxide_alarm') ? '1' : '0',
        ]);
    }

    public function AddRules($request, $listing)
    {


        ListingRule::where('listing_id', $listing->listing_id)
            ->update([
                'garbage_disposal' => $request->has('garbage_disposal') ? '1' : '0',
                'claygo' => $request->has('claygo') ? '1' : '0',

                'no_smoking' => $request->has('no_smoking') ? '1' : '0',
                'no_drinking' => $request->has('no_drinking') ? '1' : '0',
                'no_pets' => $request->has('no_pets') ? '1' : '0',
                'no_events' => $request->has('no_events') ? '1' : '0',

                'curfew' => $request->input('curfew'),
                'additional_rules' => $request->input('additional_rules'),
            ]);
    }
}
