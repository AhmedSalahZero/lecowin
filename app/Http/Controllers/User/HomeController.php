<?php

namespace App\Http\Controllers\User;

use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.account.index')->with('currentUser',Auth()->user()->load('rule'));
    }
    public function show()
    {
        return view('user.libraries.index')->with('libraries',Library::with('creator')->get());
    }
    public function showFile(Library $library)
    {
        $headers = ['Content-Type' => 'application/pdf'];
        return response()->download(storage_path('app/public/'.$library->pdf), 'test.pdf', $headers);
    }


}