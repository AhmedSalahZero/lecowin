<?php

namespace App\Http\Requests;

use App\Rules\PositiveNumberRule;
use App\Rules\ReceiverExistRule;
use App\Rules\senderHasEnoughMoneyRule;
use App\Rules\SenderIsNotTheReciever;
use App\Rules\validPasswordRule;
use App\Rules\validReceiverCodeRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ConfirmTransactionRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'receiver_code'=>['required',new validReceiverCodeRule() , new ReceiverExistRule() , new SenderIsNotTheReciever()],
            'amount'=>['required','numeric',new PositiveNumberRule() , new senderHasEnoughMoneyRule($request->user())]
        ];
    }

    public function messages()
    {
        return [
          'receiver_code.required'=>'You have to insert the receiver code ',
            'amount.required'=>'please insert the amount ' ,
            'amount.numeric'=>'invalid amount'  ,
        ];
    }
}
