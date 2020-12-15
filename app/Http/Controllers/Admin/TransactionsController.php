<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddMoneyRequest;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TransactionsController extends Controller
{
    public function index()
    {
       return view('admin.transactions.index')->with('transactions',Transaction::with(['sender','receiver'])->orderBy('created_at','desc')->get());
    }
    public function add(AddMoneyRequest $request,User $user):RedirectResponse
    {
        $user->addTransactionAsReceiver($request,User::adminTransfer,null);
        $user->addFinance($request,User::adminTransfer);
        return redirect()->back()->with('success','Done !');
    }
    public function ActivationUser(User $user,Request $request):RedirectResponse
    {
        if($user->activeUser($request,true))
        return redirect()->back()->with('success','Done !');
        return redirect()->back()->with('fail','This user already activated');
    }
}
