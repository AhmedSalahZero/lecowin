<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class adminSendNotificationRequest extends FormRequest
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
            'message_en'=>'required|max:255' ,
            'message_ar'=>'required|max:255'
        ];
    }
    public function messages()
    {
        return [
            'message_en.required'=>'You Have To Insert English Message',
            'message_en.max'=>'To Much Letters !',
            'message_ar.required'=>'You Have To Insert Arabic Message',
            'message_ar.max'=>'To Much Letters !',

        ];
    }
}
