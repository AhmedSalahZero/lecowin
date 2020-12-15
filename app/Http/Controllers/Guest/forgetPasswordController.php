<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\User;
use App\Traits\ResetPassword;
use Illuminate\Http\Request;

class forgetPasswordController extends Controller
{
    use ResetPassword ;

    public function index()
    {
        return view('guest.forgetPassword.index');
    }
    public function store(Request $request)
    {

        if($user = $this->findUser($request)){
            $token = $this->createPasswordResetToken($request);
            $this->sendResetEmail($request , $token);
            return redirect()->back()->withErrors([
                'success'=>'Reset link has been sent to your email .. check your mail inbox .. '
            ]);
        }
            else{
                return redirect()->back()->withErrors([
                    'email'=>'This email does not exist in our records .. '
                ]);
            }
    }

}
