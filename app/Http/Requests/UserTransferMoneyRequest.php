<?php

namespace App\Http\Requests;

use App\Rules\confirmPasswordRule;
use App\Rules\PositiveNumberRule;
use App\Rules\senderHasEnoughMoneyRule;
use App\Rules\validPasswordRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserTransferMoneyRequest extends FormRequest
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
     * @param Request $request
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'receiver_email'=>'required|exists:users,email',
            'receiver_phone'=>'required|exists:users,phone' ,
            'amount'=>['required','numeric',new PositiveNumberRule() , new senderHasEnoughMoneyRule($request->user())] ,
            'password'=>['required',new validPasswordRule($request->user())]
        ];
    }
    public function messages()
    {
        return [
            'receiver_email.required'=>'you have to insert the receiver email',
            'receiver_email.exists'=>'this email address does not exist in our records',
            'receiver_phone.required'=>'you have to insert the receiver phone',
            'receiver_phone.exists'=>'this phone number does not exist in our records' ,
            'amount.required'=>'please insert the amount ' ,
            'amount.numeric'=>'invalid amount'  ,
        ];
    }
}
