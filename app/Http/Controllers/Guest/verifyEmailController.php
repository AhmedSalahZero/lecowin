<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterStoreRequest;
use App\Events\UserEnteredHisCredential ;
use App\Models\VerificationUser;
use Illuminate\Http\Request;

class verifyEmailController extends Controller
{
    public function index(RegisterStoreRequest $request,VerificationUser $verificationUser,$token)
    {
        Event(new UserEnteredHisCredential($request->email,$token,$verificationUser->generateVerificationCode()));
        return view('guest.verifyEmail.index')->with('userData',$request->all())->with('token',$token);
    }
}
