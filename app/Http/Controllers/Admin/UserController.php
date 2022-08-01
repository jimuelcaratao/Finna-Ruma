<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $tableUsers = User::all();

        $host_pending = User::where('is_admin', 2)->whereNull('approved_at')->count();
        $hosts = User::where('is_admin', 2)->whereNotNull('approved_at')->count();
        $admins = User::where('is_admin', 1)->count();
        $users_count = User::where('is_admin', 0)->count();

        if ($tableUsers->isEmpty()) {
            $users = User::oldest()->paginate();
        }

        if ($tableUsers->isNotEmpty()) {
            // search validation
            $search = User::namefilter()
                ->rolefilter()
                ->first();

            if ($search === null) {
                return Redirect::route('admin.users')->with('info', 'No data found in the database.');
            }

            if ($search != null) {
                // default returning
                $users = User::namefilter()
                    ->rolefilter()
                    ->oldest()
                    ->paginate(10);
            }
        }


        return view('pages.admin.users', [
            'users' =>   $users,
            'host_pending' =>   $host_pending,
            'hosts' =>   $hosts,
            'users_count' =>   $users_count,
            'admins' =>   $admins,
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'is_admin' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::route('admin.users')
                ->with('toast_error', $validator->messages()->all())
                ->withInput();
        }


        User::firstOrCreate([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'is_admin' => $request->input('is_admin'),
            'password' => Hash::make($request->input('password')),
        ]);

        return Redirect::route('admin.users')->withSuccess('User :' . $request->input('name') . '. Created Successfully!');
    }

    public function update(Request $request)
    {
        // dd($request->all());

        $user = User::where('email', Auth::user()->email)->first();

        if ($user->password == null) {
            return Redirect::back()->with('info', 'Opps you have currently no password.');
        }

        if (Hash::check($request->input('password'), $user->password)) {

            $get_user = User::where('id', $request->input('id'))
                ->update([
                    'is_admin' => $request->input('is_admin'),
                ]);

            if (!empty($request->input('status'))) {
                $get_user = User::where('id', $request->input('id'))
                    ->update([
                        'status' => $request->input('status'),
                        'approved_at' => Carbon::now(),
                    ]);
            }

            return Redirect::back()->with('success', 'User Successfully updated.');
        } else {
            return Redirect::back()->with('info', 'Sorry Wrong credentials.');
        }
    }

    public function ban(Request $request)
    {

        $user = User::where('email', Auth::user()->email)->first();

        if ($user->password == null) {
            return Redirect::back()->with('info', 'Opps you have currently no password.');
        }

        if (Hash::check($request->input('password'), $user->password)) {

            $get_user = User::where('id', $request->input('id'))->first();

            if ($get_user->is_banned == null) {

                $get_user->update([
                    'is_banned' => Carbon::now(),
                ]);
                return Redirect::back()->with('success', 'Yey user is banned now.');
            }
            if ($get_user->is_banned != null) {
                $get_user->update([
                    'is_banned' => null,
                ]);
                return Redirect::back()->with('success', 'Yey user is unbanned now.');
            }
        } else {
            return Redirect::back()->with('info', 'Sorry Wrong credentials.');
        }
    }
}
