<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Session;
use Illuminate\Foundation\Auth\SubRegister;

class regSecondController extends Controller
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

    use SubRegister;

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
        // $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd('helo');
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'fk_department_id' => ['required','integer','exists:departments,department_id'],
            'fk_pos_id' => ['required','integer','exists:positions,pos_id'],
            'fk_role_id' => ['required','integer','exists:roles,id']
        ],[
            'fk_department_id.required' => 'Department is required.',
            'fk_department_id.integer' => 'Department Id should be a number.',
            'fk_department_id.exists' => 'Department Id does not exist in database.',
            'fk_pos_id.required' => 'Post is required.',
            'fk_pos_id.integer' => 'Post Id should be a number.',
            'fk_pos_id.exists' => 'Post Id does not exist in database.',
            'fk_role_id.required' => 'Role is required.',
            'fk_role_id.integer' => 'Role Id should be a number.',
            'fk_role_id.exists' => 'Role Id does not exist in database.',

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
        // dd('helo');

        // Session::flash('message','New User Is Created');
        // Session::flash('alert-class','alert-danger');
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            // 'fk_role_id' => 1,
            'fk_department_id' => $data['fk_department_id'],
            'fk_pos_id' => $data['fk_pos_id'],
            'fk_role_id' => $data['fk_role_id'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
