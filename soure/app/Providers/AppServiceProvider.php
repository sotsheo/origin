<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Backend_menu;
use App\Newsnew;
use App\Category_news;

use App\Banner_category;
use App\Banner;
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
        // menu
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
          view()->composer('backend.news.update',function($view){
            $menu=Backend_menu::all();
            $view->with("menus",$menu);
        });

        // Category _news
          view()->composer('backend.news.create',function($view){
            $categorys=Category_news::all();
            $view->with("categorys",$categorys);
        });
           view()->composer('backend.news.update',function($view){
            $categorys=Category_news::all();
            $view->with("categorys",$categorys);
        });
            view()->composer('backend.news.index',function($view){
            $categorys=Category_news::all();
            $view->with("categorys",$categorys);
        });

        // news
            view()->composer('backend.news.index',function($view){
            $news=Newsnew::all();
            $view->with("news",$news);
        });

        // banner category
            view()->composer('backend.banner.index',function($view){
            $category=Banner_category::all();
            $view->with("categorys",$category);
        });
            view()->composer('backend.banner.index',function($view){
            $banners=Banner::all();
            $view->with("banners",$banners);
        });
            view()->composer('backend.banner.create',function($view){
            $categorys=Banner_category::all();
            $view->with("categorys",$categorys);
        });
             view()->composer('backend.banner.update',function($view){
            $categorys=Banner_category::all();
            $view->with("categorys",$categorys);
        });
             view()->composer('backend.banner.category',function($view){
            $banners=Banner_category::all();
            $view->with("banners",$banners);
        });
              

        // news

           view()->composer('frontend.newsnew.index',function($view){
            $news=Newsnew::all();
            $view->with("news",$news);
        });
           view()->composer('frontend.categorynews.index',function($view){
            $categorys=Category_news::all();
            $view->with("categorys",$categorys);
        });

           // newsIncategory
           view()->composer('frontend.newsincategory.index',function($view){
            $categorys=Category_news::where("name","Quan ly nhan vien")->take(1)->get();
            $news=Newsnew::where("id",$categorys[0]["id"])->get();
            $view->with("news",$news);
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
