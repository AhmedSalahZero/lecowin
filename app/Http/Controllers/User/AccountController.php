<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\changeTransactionPasswordRequest;
use App\Http\Requests\StorePassportImageRequest;
use App\Http\Requests\StoreProfileImageRequest;
use App\Http\Requests\ValidUserCodeRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index(Request $request)
    {

        if(!Auth()->check())
        {
            $user = User::where('code',Request()->segment(3))->first() ;
            if ($user)
                $user->load('rule');
            else{
                abort(404);
            }
        }
        return view('user.account.index')->with('currentUser',(Auth()->check()) ? Auth()->user()->load('rule') :$user);

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

    public function changeProfileImage(StoreProfileImageRequest  $request,User $user):RedirectResponse
    {
        $user->ChangeProfileImage($request);
        return redirect()->route('user.account.setting',[App()->getLocale(),'#tab_1_2']);
    }
    public function changePassportImage(StorePassportImageRequest $request , User $user): RedirectResponse
    {
        $user->ChangePassportImage($request);
        return redirect()->route('user.account.setting',[App()->getLocale(),'#tab_1_4']);
    }

    public function changeProfilePassword(Request $request , User $user)
    {
        $result = $user->changeProfilePassword($request);
       if (array_key_exists('fail' , $result))
        return redirect()->route('user.account.setting',[App()->getLocale(),'#tab_1_3'])->with('fail',$result['fail']);
        return redirect()->route('user.account.setting',[App()->getLocale(),'#tab_1_3'])->with('success',$result['success']);
    }
    public function activeMyAccount(User $user,Request $request):RedirectResponse
    {
        if($user->hasEnoughMoney())
        {
            $user->activeUser($request,false);
            return redirect()->back()->with('success',trans('lang.your account has been activated'));
        }
        return redirect()->back()->with('fail',trans('lang.You must have').User::getActivationAmount().trans('lang.EGP in your account'));
    }
    public function changeTransferPassword(changeTransactionPasswordRequest $request,User $user):RedirectResponse
    {
        $user->update([
            'transfer_password'=>$request->new_transfer_password // hashed by
        ]);
        return redirect()->back()->with('success',trans('lang.done'));
    }

}
