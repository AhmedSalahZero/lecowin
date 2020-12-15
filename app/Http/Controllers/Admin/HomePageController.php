<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Library;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        return view('admin.home.index');
    }

}
