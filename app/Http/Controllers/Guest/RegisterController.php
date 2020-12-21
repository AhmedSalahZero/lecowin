<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('guest.register.index');
    }
    public function store(RegisterStoreRequest $request)
    {
        // Note That : Password and Rule_id inserted from user Model (boot method)
        User::create($request->only(['name','address' , 'phone','email']));
        return redirect()->route('account.index');
    }

}
