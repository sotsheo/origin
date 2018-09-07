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

Route::get('/', function () {
    return view('welcome');
});
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
     Route::group(['namespace' => 'Backend','prefix' => 'news'],function(){
     	Route::get('index', 'News@index');
     	Route::get('newscategory', 'News@newscategory');
     	Route::get('createcategory', 'News@category_create');
     	Route::post('create_category', ["as"=>"create_category","uses"=>"News@create_category"]);
     	Route::get('category_update/{id}', 'News@category_update');
     	Route::post('update_category', ["as"=>"update_category","uses"=>"News@update_category"]);
     	Route::get('category_delete/{id}', "News@category_delete");
    });
});
