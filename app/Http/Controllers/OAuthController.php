<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class OAuthController extends Controller
{

    public function callbackGoogle()
    {

        $user = Socialite::driver('google')->stateless()->user();

        $existingUser = User::where('external_id', $user->getId())->first();

        // already exist callback need 

        if ($existingUser && $existingUser->is_banned != '') {
            return redirect('/login')->withInfo('Your account is currently banned. :(');
        }
        if ($existingUser) {
            Auth::login($existingUser);
            return Redirect::route('admin.dashboard');
        }

        if ($existingUser === null) {
            try {
                $new_user = User::create([
                    'external_provider' => 'Google',
                    'external_id' => $user->getId(),
                    'name' => $user->getName(),
                    'email' =>  $user->getEmail(),
                ]);

                Auth::login($new_user, true);
                return Redirect::route('admin.dashboard');
            } catch (QueryException $e) {

                $errorCode = $e->errorInfo[1];

                if ($errorCode == '1062') {
                    return Redirect::route('register')->withErrors('Cannot create a account email is already taken. Please use another email.');
                }
            }
        }
    }
}
