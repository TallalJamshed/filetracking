<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages(){
        $messages =  [
            'name.required' => 'Full Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email formate is not correct',
            'email.unique' => 'Email already exists',
            'password.required' => 'Password is required',
            'password_confirmation.required' => 'Password Confirmation is required',
            'password_confirmation.same' => 'Password does not match',
            'fk_faculty_id.required' => 'Faculty Id is required',
            'fk_faculty_id.numeric' => 'Faculty Id should be numeric',
            'fk_faculty_id.exists' => 'Faculty Id does not exist in Database',
            'fk_department_id.required' => 'Department Id is required',
            'fk_department_id.numeric' => 'Department Id should be numeric',
            'fk_department_id.exists' => 'Department Id does not exist in Database',
            'fk_position_id.required' => 'Post Id is required',
            'fk_position_id.numeric' => 'Post Id should be numeric',
            'fk_position_id.exists' => 'Post Id does not exist in Database',
            'fk_role_id.required' => 'Role Id is required',
            'fk_role_id.numeric' => 'Role Id should be numeric',
            'fk_role_id.exists' => 'Role Id does not exist in Database',
        ];
        return $messages;
    }

    public function rules()
    {
        $rules =  [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            'fk_faculty_id' => 'required|numeric|exists:faculties,faculty_id',
            'fk_department_id' => 'required|numeric|exists:departments,department_id',
            'fk_pos_id' => 'required|numeric|exists:positions,pos_id',
            'fk_role_id' => 'required|numeric|exists:roles,id',
        ];
        return $rules;
    }
}
