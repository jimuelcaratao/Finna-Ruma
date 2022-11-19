<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'is_host' => ['string'],
            'status' => ['string'],
            'address' => ['required', 'string'],
            'contact' => ['required', 'integer', 'digits:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // host
        if ($input['is_admin'] === null) {

            Validator::make($input, [
                'student_id' => ['required', 'string', 'max:255'],
            ])->validate();

            // tenant
            return User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'student_id' => $input['student_id'],
                'address' => $input['address'],
                'contact' => $input['contact'],
                'password' => Hash::make($input['password']),
            ]);
        }



        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'address' => $input['address'],
            'contact' => $input['contact'],
            'status' => "Pending Approval",
            'is_admin' => '2',
            'password' => Hash::make($input['password']),
        ]);
    }
}
