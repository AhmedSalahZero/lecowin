<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function index($token ,$email)
    {
        if ( PasswordReset::where('email',$email)->where('token',$token)->first()){
            return view('guest.resetPassword.index')->with('token',$token);
        }
        abort(404);
    }
    public function store(ResetPasswordRequest $request,$token)
    {




        if ($email=PasswordReset::where('token',$token)->first()->email){
            $user = User::where('email',$email)->first();
            $user->resetPassword($request);
            $user->loginUser();
            $this->deleteOldToken($token);
            return redirect()->route('account.index');

        };

    }
    protected function deleteOldToken($token)
    {
        PasswordReset::where('token',$token)->delete();
    }
}
