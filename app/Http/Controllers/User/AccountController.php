<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\changeTransactionPasswordRequest;
use App\Http\Requests\StoreProfileImageRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {

        return view('user.account.index')->with('currentUser',Auth()->user()->load('rule'));

    }
    public function setting()
    {
        return view('user.account.setting')->with('currentUser' , Auth()->user()->load(['rule','levels','netWorks','finances']));

    }
    public function saveAccountInfo(Request $request , User $user )
    {
        $user->EditAccount($request);
        return redirect()->back();
    }

    public function changeProfileImage(StoreProfileImageRequest  $request,User $user)
    {
        $user->ChangeProfileImage($request);
        return redirect()->route('user.account.setting','#tab_1_2');
    }

    public function changeProfilePassword(Request $request , User $user)
    {
        $result = $user->changeProfilePassword($request);
       if (array_key_exists('fail' , $result))
        return redirect()->route('user.account.setting','#tab_1_3')->with('fail',$result['fail']);
        return redirect()->route('user.account.setting','#tab_1_3')->with('success',$result['success']);
    }
    public function activeMyAccount(User $user,Request $request):RedirectResponse
    {
        if($user->hasEnoughMoney())
        {
            $user->activeUser($request,false);
            return redirect()->back()->with('success','your account has been activated');
        }
        return redirect()->back()->with('fail','You must have '.User::getActivationAmount().' EGP in your account');
    }
    public function changeTransferPassword(changeTransactionPasswordRequest $request,User $user):RedirectResponse
    {
        $user->update([
            'transfer_password'=>$request->new_transfer_password // hashed by
        ]);
        return redirect()->back()->with('success','Done !');
    }
}
