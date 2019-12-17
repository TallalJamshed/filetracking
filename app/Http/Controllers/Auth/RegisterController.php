<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        dd('helo');
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'fk_deartment_id' => ['required','integer','exists:departments,department_id'],
            // 'fk_pos_id' => ['required','integer','exists:positions,pos_id'],
            // 'fk_role_id' => ['required','integer','exists:roles,id']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        dd('helo');
        // Session::flash('message','New User Is Created');
        // Session::flash('alert-class','alert-danger');
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            // 'fk_role_id' => 1,
            // 'fk_department_id' => $data['fk_department_id'],
            // 'fk_pos_id' => $data['fk_pos_id'],
            // 'fk_role_id' => $data['fk_role_id'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
