<?php


namespace App\Traits;


use App\Jobs\SendEmailJob;
use App\Mail\SendRestPasswordEmail;
use App\Models\PasswordReset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

trait ResetPassword
{
    protected function findUser($request)
    {
        return User::whereEmail($request->email)->first();
    }
    protected function createPasswordResetToken($request)
    {
        return PasswordReset::create([
            'email'=>$request->email ,
            'token'=>Str::random(60),
            'created_at'=>Carbon::now()
        ]);
    }
    protected function sendResetEmail($request , $token)
    {
        mail::to($request->email)->send(new SendRestPasswordEmail($this->generateResetLink($request , $token)));
    }
    protected function generateResetLink($request , $token):string
    {
        return URL::to('/') . '/'.App::getLocale().'/password/reset/'.$token->token.'/'.urlencode($request->email) ;
    }

}
