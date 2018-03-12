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
Route::get('/',"Frontend@index")->name("home");
Route::get('acc_close',"Frontend@acc_close");
Route::get('login',"Frontend@login")->middleware("checkclient");
Route::get('history',"Frontend@history")->middleware("checkclient");
Route::get('registration',"Frontend@registration");
Route::get('recharge',"Frontend@recharge");
Route::post("action",["as"=>"action","uses"=>"Frontend@action"]);
Route::group(['prefix' => 'front'],function(){
	Route::get("ajaxs","Ajaxs@index");
	Route::get("time","Ajaxs@time");
	Route::get("rent","Ajaxs@rent");
});
Route::get('logout',"Frontend@logout")->name('logout');

// backend
Route::get('admin',function(){
	return redirect("admin/home");
});
Route::group(['namespace' => 'Bakend','prefix' => 'admin'],function(){
	Route::get("login","Home@login")->middleware("checkadmin");
	Route::get("home","Home@index")->middleware("checkadmin");
	Route::post("admin_action",["as"=>"admin_action","uses"=>"Home@admin_action"]);
	// category
	Route::group(['prefix' => 'category'],function(){
		Route::get("list","Categorys@index")->middleware("checkadmin");
		Route::get("add","Categorys@add")->middleware("checkadmin");
		Route::post("add_actegory",["as"=>"add_actegory","uses"=>"Categorys@add_actegory"]);
		Route::get("delete/{id}","Categorys@delete")->middleware("checkadmin");
		Route::get("edit/{id}","Categorys@edit")->middleware("checkadmin");
		Route::post("edit_category",["as"=>"edit_category","uses"=>"Categorys@edit_category"]);
	});
	// account
	Route::group(['prefix' => 'account'],function(){
		Route::get("list","Accounts@index")->middleware("checkadmin");\
		Route::get("add","Accounts@view_addaccount")->middleware("checkadmin");
		Route::post("add_account",["as"=>"add_account","uses"=>"Accounts@add_account"]);
		Route::get("edit/{id}","Accounts@view_editaccount")->middleware("checkadmin");
		Route::post("edit_account",["as"=>"edit_account","uses"=>"Accounts@edit_account"]);
		Route::get("delete/{id}","Accounts@delete_account")->middleware("checkadmin");
	});
	// client
	Route::group(['prefix' => 'client'],function(){
		Route::get("list","clients@index")->middleware("checkadmin");
		Route::get("add","clients@add")->middleware("checkadmin");
		Route::get("rent/{id}","clients@rent")->middleware("checkadmin");
	});
	// change
	Route::group(['prefix' => 'change'],function(){
		Route::get("list","Changes@index")->middleware("checkadmin");
		Route::get("edit/{id}","Changes@change")->middleware("checkadmin");
		Route::post("changeedit","Changes@changeedit")->name("changeedit");
	});

});
