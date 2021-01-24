<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterStoreRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\VerifiyTokenRequest;
use App\Models\User;
use App\Models\VerificationUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index(Request $request , VerificationUser $verificationUser)
    {
        return view('guest.register.index')->with('token',$verificationUser->generateRandToken());
    }

    public function store(Request $request)
    {
         //   $verificationUser->deleteOldVerificationCode($originToken);
            User::create($request->only(['first_name','last_name','address' , 'phone','email']));
            return redirect()->route('user.home',App()->getLocale());
    }
//    public function store(StoreUserRequest $request,VerificationUser $verificationUser,$originToken)
//    {
//        $verificationUser->deleteOldVerificationCode($originToken);
//        User::create($request->only(['first_name','last_name','address' , 'phone','email']));
//        return redirect()->route('user.home',App()->getLocale());
//    }

    public function registerUser( VerificationUser $verificationUser,$code)
    {
        if(User::where('code',$code)->exists() && User::where('code',$code)->first()->isActivated())
        {

            return view('guest.register.registerUser')->with('code',$code)->with('token',$verificationUser->generateRandToken());
        }
        abort(404);
    }
    public function rules()
    {
        return [
            'code'=>'required|numeric' ,
        ];
    }
    public function messages()
    {
        return [
            'code.numeric'=>trans('lang.Invalid Verification Code') ,
            'code.required'=>trans('lang.You Have To Enter Verification Code') ,
            'code.max'=>trans('lang.maxLetters')
        ];
    }


}
