<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class loginController extends Controller
{
    public function login()
    {
        return view('guest.login.index');
    }
    public function submitLogin(Request $request)
    {

        if(!Auth()->attempt($request->only('email','password'),$request->remember))
        {
            session()->flash('fail','your credentials are invalid ');
            return redirect()->back()->withInput($request->only(['email','remember']));
        }

        if(Auth()->user()->rule_id == 1 )
            return redirect()->intended(Route('admin.home'));
        return redirect()->intended(Route('user.home',App()->getLocale()));
    }
}
