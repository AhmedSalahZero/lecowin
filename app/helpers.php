<?php

use App\Models\Level_finance;
use App\Models\User;
use Carbon\Carbon;

if(!function_exists('format_date')){
    function format_date ($date){
        return date('l , d F Y ' , strtotime($date)) ;
    }
}


if(!function_exists('level_object')){
    function level_object ($level){
        return Level_finance::where('level',$level)->first();
    }
}

if (!function_exists('differentInYears')){
    function differentInYears($data):int
    {
            $data=Carbon::parse($data->format('Y-m-d')) ;
            return Carbon::parse($data)->diffInYears() ;
            /*
             * note that :
             * the date must be converted in the model
             * e.g
             * protected $dates = ['activated_at'];
             * */
    }
}

if (!function_exists('differentInDays')){
    function differentInDays($data):int
    {
        $data=Carbon::parse($data->format('Y-m-d')) ;
        return Carbon::parse($data)->diffInDays() ;
        /*
         * note that :
         * the date must be converted in the model
         * e.g
         * protected $dates = ['activated_at'];
         * */
    }
}
if (!function_exists('expiresYear')) {
    function expiresYear($data): string
    {
        $data = Carbon::parse($data->format('Y-m-d'));
        return Carbon::parse($data)->addYear()->toDateString();
        /*
         * note that :
         * the date must be converted in the model
         * e.g
         * protected $dates = ['activated_at'];
         * */
    }
    if (!function_exists('expiresDays')) {
        function expiresDays($data): int
        {

            return Carbon::now()->diffInDays($data, false) ;

        }

    }


}
