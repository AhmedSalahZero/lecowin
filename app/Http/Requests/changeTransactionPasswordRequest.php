<?php

namespace App\Http\Requests;

use App\Rules\CheckOldTrasferPassword;
use App\Rules\confirmAccountPassword;
use App\Rules\confirmPasswordRule;
use App\Rules\validPasswordRule;
use Illuminate\Foundation\Http\FormRequest;

class changeTransactionPasswordRequest extends FormRequest
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
        if(Auth()->user()->transfer_password)
        {
            $field = 'old_transfer_password' ;
            $rules = ['required' , new CheckOldTrasferPassword() , ] ;
        }
            else{
                $field = 'account_password';
                $rules = ['required' ,new validPasswordRule(Request()->user())];
            }



        return [
            $field=>$rules,
            'new_transfer_password'=>'required|max:255',
            'confirm_new_transfer_password'=>['required' , new confirmAccountPassword()]
        ];
    }
    public function messages()
    {
        return [
            'old_transfer_password.required'=>'you have to insert your old transfer password' ,
            'account_password.required'=>'you have to insert your account password !' ,
            'new_transfer_password.required'=>'you have to insert your new transaction password' ,
            'new_transfer_password.max'=>'too much letters ! ' ,
            'confirm_new_transfer_password.required'=>'you have to confirm your new transaction password' ,
        ];
    }
}
