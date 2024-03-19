<?php

namespace App\Actions\Fortify;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

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
            'phone' => ['required', 'string', 'max:255', Rule::unique(User::class)],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
        ])->validate();

        $password = Str::random(12);

        $maildata = [
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => $password,
        ];

        Mail::to($input['email'])->send(new \App\Mail\UserRegisterNotification($maildata));
        return User::create([
            'name' => $input['name'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            'password' => Hash::make($password),
            'is_active' => false,
        ]);
    }
}
