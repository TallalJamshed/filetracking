<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class fileAddRequest extends FormRequest
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
            'ref_initial.required' => 'Initial reference is required',
            'ref_no.required' => 'Reference number is required',
            'ref_no.numeric' => 'Reference number should be numeric',
            'subject.required' => 'Subject is required',
            'fk_faculty_id.required' => 'Faculty Id is required',
            'fk_faculty_id.numeric' => 'Faculty Id should be numeric',
            'fk_faculty_id.exists' => 'Faculty Id does not exist in Database',
            'fk_department_id.required' => 'Department Id is required',
            'fk_department_id.numeric' => 'Department Id should be numeric',
            'fk_department_id.exists' => 'Department Id does not exist in Database',
            'fk_position_id.required' => 'Post Id is required',
            'fk_position_id.numeric' => 'Post Id should be numeric',
            'fk_position_id.exists' => 'Post Id does not exist in Database',
            'track_name.required' => 'Name is required',
            // 'comments.required' => 'Comments are required',
        ];
        return $messages;
    }

    public function rules()
    {
        $rules =  [
            'ref_initial' => 'required',
            'ref_no' => 'required|numeric',
            'subject' => 'required',
            'fk_faculty_id' => 'required|numeric|exists:faculties,faculty_id',
            'fk_department_id' => 'required|numeric|exists:departments,department_id',
            'fk_position_id' => 'required|numeric|exists:positions,pos_id',
            'track_name' => 'required',
            // 'comments' => 'required',
        ];
        return $rules;
    }

}
