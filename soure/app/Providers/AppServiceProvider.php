<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Backend_menu;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('backend.head.index',function($view){
            $menu=Backend_menu::all();
            $view->with("menus",$menu);
        });
         view()->composer('backend.menu.create',function($view){
            $menu=Backend_menu::all();
            $view->with("menus",$menu);
        });
          view()->composer('backend.menu.update',function($view){
            $menu=Backend_menu::all();
            $view->with("menus",$menu);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
