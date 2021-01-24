<?php

namespace App\Http\Requests;

use App\Rules\confirmParentCodeRule;
use App\Rules\confirmPasswordRule;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Http\FormRequest;

class RegisterStoreRequest extends FormRequest
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
    public function rules()
    {
        return [
            'first_name'=>'required|max:255',
            'last_name'=>'required|max:255',
            'email'=>'required|email|unique:users,email' ,
            'address'=>'required|max:255',
            'phone'=>'required|numeric',
            'password'=>['required','max:255'],
            'confirm_password'=>['required',new confirmPasswordRule(Request()->password)] ,
            'parentCode'=>['required',new confirmParentCodeRule() ] ,
         ];
    }
    public function messages()
    {
        return [
            'first_name.required'=>'You have to enter your first name' ,
            'first_name.max'=>'too large letters ! '  ,
            'last_name.required'=>'You have to enter your last name' ,
            'last_name.max'=>'too large letters ! '  ,
            'email.required'=>'you have to insert your email' ,
            'email.email'=>'invalid email' ,
            'email.unique'=>'This email already exists' ,
            'phone.required'=>'you have to enter your phone ' ,
            'phone.numeric'=>'invalid phone number' ,
            'password.required'=>'please enter your password' ,
            'password.max'=>'too large password ! ' ,
            'confirm_password.required'=>'please confirm the password'
        ];
    }
}
