<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserTransferMoneyRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionsController extends Controller
{
    public function index(User $user)
    {

        return view('user.transactions.index')->with('user',$user->load(['transactionsAsReceiver.sender','transactionsAsSender.receiver']));
    }
    public function transferMoney(UserTransferMoneyRequest $request ,User $user)
    {

        $receiver = User::findReceiver($request);
        if ($receiver)
        {
            $user->sendMoneyTo($receiver,$request);
            return redirect()->back()->with('success','money has been transformed');
        }
        return redirect()->back()->with('fail','this receiver does not exist');
    }
    public function wallet(User $user)
    {
        return view('user.transactions.wallet')->with('currentUser',$user->load(['transactionsAsSender','transactionsAsReceiver']));
    }

}
