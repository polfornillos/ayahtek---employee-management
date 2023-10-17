<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;
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
        // $data = array();
        // $data = User::where('id', '=', Session::get('loginId'))->first();
        // $user = session('loginId');
        // $user = Auth::user();
        // dd($user);
        // View::composer('*', function($view){
        //     // $view->with('name', $data->name);
        //     $view->with('email', 'besadiether031@gmail.com');

        // });
    }
}
