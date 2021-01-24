<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
   // use HasFactory;
    protected $fillable = ['setting_name','setting_value'];

    public static function liveChatStatus()
    {
        return Setting::where('setting_name','liveChatStatus')->first()->setting_value ;
    }

}
