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
if (!function_exists('differentInMonths')){
    function differentInMonths($data):int
    {
        $data=Carbon::parse($data->format('Y-m-d')) ;
        return Carbon::parse($data)->diffInMonths() ;
        /*
         * note that :
         * the date must be converted in the model
         * e.g
         * protected $dates = ['activated_at'];
         * */
    }
}

if (!function_exists('differentInMinutes')){
    function differentInMinutes($data):int
    {
        return Carbon::parse($data)->diffInMinutes() ;
    }
}
if (!function_exists('differentInHours')){
    function differentInHours($data):int
    {
        return Carbon::parse($data)->diffInHours() ;
    }
}

if (!function_exists('leftTime')){
    function leftTime($data):string
    {

        if(App()->getLocale() =='ar')
        {
            if(differentInMinutes($data)<=59 ){
                if (differentInMinutes($data) == 1 )
                    return  ' دقيقية '  ;
                elseif (differentInMinutes($data) == 0)
                    return  'الان '   ;
                elseif (differentInMinutes($data) ==2)
                    return  ' دقيقتين '  ;
                elseif (differentInMinutes($data) < 11 && differentInMinutes($data) >2)
                    return    differentInMinutes($data).' دقائق '  ;
                return differentInMinutes($data) . ' دقيقية ' ;
            }
            elseif ( differentInHours($data) <= 23){
                if (differentInHours($data) == 1)
                    return ' ساعة ';
                elseif (differentInHours($data) == 2)
                    return  ' ساعتين ' ;
                elseif (differentInHours($data) < 11 && differentInHours($data) >2)
                    return  differentInHours($data)  . ' ساعات ' ;
                else
                    return differentInHours($data) . ' ساعة ' ;

            }
            elseif (differentInDays($data)<=23)
            {
                if (differentInDays($data) == 1)
                    return ' يوم ' ;
                elseif(differentInDays($data) == 2)
                    return ' يومان ';
                elseif(differentInDays($data) < 11 && differentInDays($data) > 2)
                    return differentInDays($data) . ' ايام ';

                return differentInDays($data) . ' ايام ' ;
            }
            elseif (differentInMonths($data)<=11 )
            {
                if (differentInMonths($data) == 1)
                    return differentInMonths($data)  . ' شهر ';
                elseif (differentInMonths($data) == 2)
                    return  ' شهرين ';
                elseif (differentInMonths($data) < 11 && differentInMonths($data)>2)
                    return differentInMonths($data)  . ' شهور ';

                return differentInMonths($data)  . ' شهر ';
            }
            else
                {
                if (differentInYears($data) == 1)
                    return ' سنة ';
                elseif (differentInYears($data) == 2)
                    return ' سنتين ';
                elseif (differentInYears($data) <11 && differentInYears($data)>2)
                    return differentInYears($data) . ' سنين ';
                return differentInYears($data) . ' سنة  ' ;
                }
        }
        else{

            if(differentInMinutes($data)<=59 ){

                if (differentInMinutes($data) == 1 )
                    return  (App()->getLocale() =='ar') ?'من دقيقية'  :differentInMinutes($data) .'minute';
                elseif (differentInMinutes($data) == 0)
                    return (App()->getLocale() == 'ar'? 'الان' : 'just now')  ;
                elseif (differentInMinutes($data) == 2)
                    return  (App()->getLocale() =='ar') ?'من دقيقية'  :differentInMinutes($data) .'minutes';
                return differentInMinutes($data) . ' minutes' ;
            }
            elseif ( differentInHours($data) <= 23){
                if (differentInHours($data) == 1)
                    return differentInHours($data)  . ' hour' ;
                else
                    return differentInHours($data)  . ' hours' ;

            }
            elseif (differentInDays($data)<=23)
            {

                if (differentInDays($data) == 1)
                    return differentInDays($data) . ' day' ;
                return differentInDays($data) . ' days' ;
            }
            elseif (differentInMonths($data)<=11 )
            {
                if (differentInMonths($data) == 1)
                    return differentInMonths($data)  . ' month';
                return differentInMonths($data)  . ' months';
            }
            else{
                if (differentInYears($data) == 1)
                    return differentInYears($data) .' year';
                return differentInYears($data) . ' years' ;
            }
        }

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
