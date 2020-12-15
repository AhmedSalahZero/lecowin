<?php

namespace App\Http\Requests;

use App\Rules\confirmPasswordRule;
use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'new_password'=>['required','max:255'],
            'confirm_password'=>['required',new confirmPasswordRule(Request()->new_password)] ,
        ];
    }
}
