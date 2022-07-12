<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Rules\StudentID;
use Illuminate\Support\Facades\Hash;
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
            'student_id' => ['required', 'integer', "regex:/^[0-9]{5}/", 'unique:users,student_id', new StudentID],
            'name'       => ['required', 'string', 'max:255'],
            'username'   => ['required', 'string', 'max:255', 'unique:users,username'],
            'email'      => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'phone'      => ['required', 'string', 'max:255', 'unique:users,phone'],
            'street'     => ['required', 'string', 'max:255'],
            'city'       => ['required', 'string', 'max:255'],
            'state'      => ['string', 'max:255', 'required_with:city'],
            'zip'        => ['required', 'string', 'size:5', 'required_with:city'],
            'password'   => $this->passwordRules(),
            'terms'      => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'student_id' => $input['student_id'],
            'name' => $input['name'],
            'username' => $input['username'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'street' => $input['street'],
            'city' => $input['city'],
            'state' => $input['state'],
            'zip' => $input['zip'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
