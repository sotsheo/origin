<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// frontend
Route::get('/','Frontend@index');
Route::get('category','Frontend@category_news');
Route::get('newsincategory','Frontend@newsincategory');
// Admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('home', 'Admin@home');
    Route::group(['prefix' => 'menu'],function(){
    	Route::get('index', 'Backend_menus@index');
    	Route::get('create', 'Backend_menus@create');
    	Route::post('create_menu', ["as"=>"create_menu","uses"=>"Backend_menus@create_menu"]);
    	Route::get('update/{id}', 'Backend_menus@update');
    	Route::post('update_menu', ["as"=>"update_menu","uses"=>"Backend_menus@update_menu"]);
    	Route::get('detete', 'Backend_menus@delete');
    });
    // NEWS
     Route::group(['namespace' => 'Backend','prefix' => 'news'],function(){
     	Route::get('index', 'News@index');
        // category news
     	Route::get('newscategory', 'News@newscategory');
     	Route::get('createcategory', 'News@category_create');
     	Route::post('create_category', ["as"=>"create_category","uses"=>"News@create_category"]);
     	Route::get('category_update/{id}', 'News@category_update');
     	Route::post('update_category', ["as"=>"update_category","uses"=>"News@update_category"]);
     	Route::get('category_delete/{id}', "News@category_delete");
        //  news
        Route::get('create', 'News@create');
        Route::post('create_news', ["as"=>"create_news","uses"=>"News@create_news"]);
         Route::get('update/{id}',["as"=>"update","uses"=>"News@update"]);
        Route::post('update_news', ["as"=>"update_news","uses"=>"News@update_news"]);
        Route::get('delete/{id}', "News@delete_news");
    });
     //banner
     Route::group(['namespace' => 'Backend','prefix' => 'banner'],function(){
        Route::get('index', 'Banners@index');
        // category news
        Route::get('category', 'Banners@category');
        Route::get('createcategory', 'Banners@category_create');
        Route::post('create_category', ["as"=>"create_category","uses"=>"Banners@create_category"]);
        Route::get('category_update/{id}', 'Banners@category_update');
        Route::post('update_category', ["as"=>"update_category","uses"=>"Banners@update_category"]);
        Route::get('category_delete/{id}', "Banners@category_delete");
        //  news
        Route::get('create', 'Banners@create');
        Route::post('create_banner', ["as"=>"create_news","uses"=>"Banners@create_banner"]);
         Route::get('update/{id}',["as"=>"update","uses"=>"Banners@update"]);
        Route::post('update_banner', ["as"=>"update_news","uses"=>"Banners@update_banner"]);
        Route::get('delete/{id}', "Banners@delete_banner");
    });
});
