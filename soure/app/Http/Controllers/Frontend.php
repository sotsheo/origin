<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Frontend extends Controller
{
    public function index(){
    	
    	return view("frontend.newsnew.index");
    }
    public function category_news(){
    	
    	return view("frontend.categorynews.index");
    }
    public function newsincategory(){
    	$name_category="Quan ly nhan vien";      
    	return view("frontend.newsincategory.index",["name"=>$name_category]);
    }
}
