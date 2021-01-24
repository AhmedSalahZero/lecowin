<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VerificationUser;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class NetWorkerController extends Controller
{



    public function index()
    {



        return view('user.networker.index')->with('currentUser',Auth()->user()->load(['levels.networks.netWorker'
        ]));
    }
    public function showLinear()
    {
        return view('user.networker_linear.index')->with('currentUser',Auth()->user()->load(['levels.networks.netWorker'
        ]));
    }
    public function showFourth()
    {
        return view('user.networker_fourth.index')->with('currentUser',Auth()->user()->load(['levels.networks.netWorker'
        ]));
    }
    public function myParents()
    {
        return view('user.networker.myParent')->with('myParents' , Auth()->user()->myParents([])) ;
    }
    public function myChildren(User $user)
    {
        return view('user.networker.myChildren')->with('myChildren',$user->children);
    }



}
