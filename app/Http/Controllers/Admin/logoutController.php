<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class logoutController extends Controller
{
    public function logout(User $user)
    {
        $user->logout();
        return redirect()->route('login.index');

    }
}
