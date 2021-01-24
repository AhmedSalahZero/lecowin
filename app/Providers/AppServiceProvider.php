<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        App()->bind(User::class , function(){
            return Auth()->user();
        });
        $url = '/';
        foreach (request()->segments() as $key => $segment) {
            if ($key !== 0) {
                $url .= $segment . '/';

            }
        }
        View::share('url', $url);


    }
}
