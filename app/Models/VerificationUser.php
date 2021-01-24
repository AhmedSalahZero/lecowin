<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class VerificationUser extends Model
{
    protected $fillable = ['token','code','email'];
    public  function generateVerificationCode():int
    {
        $rand = rand(1,1000000) ;
        return $rand;
    }
    public  function generateRandToken():string
    {
        return Str::random(15).time();

    }
    public function checkVerificationCode($code , $originalToken):bool
    {
        return VerificationUser::where('token',$originalToken)->where('code',$code)->exists();
    }
    public function deleteOldVerificationCode($originToken):void
    {
        VerificationUser::where('token',$originToken)->delete();

    }

}
