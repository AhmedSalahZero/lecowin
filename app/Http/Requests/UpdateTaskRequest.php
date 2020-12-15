<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize():bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name.*en'=>'required|max:255' ,
            'name.*ar'=>'required|max:255' ,
            'note.*en'=>'required|max:255',
            'note.*ar'=>'required|max:255' ,
            'due_date'=>'required'
        ];
    }
    public function messages()
    {
       return [
           'name.*en.required'=>'English name is required' ,
           'name.*ar.required'=>'Arabic name is required' ,
           'description.*en.required'=>'English description is required' ,
           'description.*ar.required'=>'Arabic description is required' ,
           'due_date.required'=>'you have to insert due date '
       ];
    }
}
