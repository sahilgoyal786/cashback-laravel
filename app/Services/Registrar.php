<?php namespace cashback\Services;

use cashback\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract
{

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'mobile_no' => 'required|numeric|unique:users|digits:10',
            'password' => 'required|confirmed|min:6',
            'agree' => 'required',
            'g-recaptcha-response' => 'required|recaptcha',
        ], array(
            'agree.required' => 'You need to agree to the terms and conditions to register.',
            'g-recaptcha-response.required' => 'Please confirm you are a human.',
        ));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile_no' => $data['mobile_no'],
            'user_type' => $data['user_type'],
            'password' => bcrypt($data['password']),
        ]);
    }

}
