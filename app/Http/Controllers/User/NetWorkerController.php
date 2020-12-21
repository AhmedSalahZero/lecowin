<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class NetWorkerController extends Controller
{

    public function index()
    {
//        $mytime = \Carbon\Carbon::now();
//        dd( $mytime->format('h A'));
        return view('user.networker.index')->with('currentUser',Auth()->user()->load(['levels.networks.netWorker'
        ]));
//        return view('user.networker.index')->with('currentUser',Auth()->user()->load(['levels.finances'
//            ,'levels.users.networks.finance','levels.networks.netWorker'
//        ]));
    }
}
