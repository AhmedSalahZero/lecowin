<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConfirmTransactionRequest;
use App\Http\Requests\UserTransferMoneyRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionsController extends Controller
{
    public function index(User $user)
    {
        return view('user.transactions.index')->with('user',$user->load(['transactionsAsReceiver.sender','transactionsAsSender.receiver']));
    }
    public function confirmReceiver(UserTransferMoneyRequest $request ,User $user):view
    {
            $receiver = User::getUserFromHisCode($request->receiver_code);
            return view('user.transactions.checkout')->with('receiver',$receiver)->with('user',$user)->with('amount',$request->amount);
    }
    public function transferMoney(ConfirmTransactionRequest $request,User $user):RedirectResponse
    {
        $receiver = User::getUserFromHisCode($request->receiver_code);
        $user->sendMoneyTo($receiver,$request);
        return redirect()->back()->with('success',trans('lang.money has been transformed'));
    }

    public function wallet(User $user):view
    {
        return view('user.transactions.wallet')->with('currentUser',$user->load(['transactionsAsSender','transactionsAsReceiver']));
    }

}
