<?php

namespace App\Http\Requests;

use App\Rules\confirmParentCodeRule;
use App\Rules\ValidVerificationCode;
use App\Rules\verifyTheSameMail;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'token'=>'required',
            'code'=>['required','numeric',new ValidVerificationCode() ],
            'email'=>['required','unique:users,email',new verifyTheSameMail(Request()->code)]  ,
            'parentCode'=>['required',new confirmParentCodeRule() ] ,
        ];
    }
    public function messages()
    {
       return [
           'code.numeric'=>trans('lang.Invalid Verification Code') ,
           'code.required'=>trans('lang.You Have To Enter Verification Code') ,
       ];
    }
}
