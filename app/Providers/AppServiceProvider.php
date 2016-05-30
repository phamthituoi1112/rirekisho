<?php

namespace app\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use Gate;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        view()->composer(['about','xCV.template'], function($view){
            if (Auth::check()) {
                $user = Auth::user();
                $cv = $user->CV;
                if (Gate::allows('get-cv', $cv)) {
                    $view->with('CV', $cv);
                }
            }        
        });
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }
}
