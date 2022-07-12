<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AddListingController extends Controller
{
    public function index()
    {
        return view('pages.host.add-listing');
    }

    public function store(Request $request)
    {
        dd($request->all());
        $validator = Validator::make($request->all(), [
            'listing_title' => 'required|unique:listings',
        ]);

        if ($validator->fails()) {
            return Redirect::back()
                ->with('toast_error', $validator->messages()->all())
                ->withInput();
        }
    }
}
