<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'tel' => ['required', 'min:10', 'max:10', 'unique:users'],
            'ville' => ['string'],
            'nom' => ['required'],
            'prenom' => ['required'],
            'adresse' => ['string'],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'name' =>       $input['name'],
            'email' =>      $input['email'],
            'tel' =>        $input['tel'],
            'nom' =>        $input['nom'],
            'prenom' =>     $input['prenom'],
            'ville' =>      $input['ville'],
            'count' =>    20,
            'ville' =>      $input['ville'],
            'password' =>   Hash::make($input['password']),
        ]);

    }
}
