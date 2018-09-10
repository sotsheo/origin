<?php


namespace App\Http\Controllers\Backend;
use App\Banner;
use App\Banner_category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
class Banners extends Controller
{
    function index(){

    }
     function category(){
        return view("backend.banner.category");
    }
    function category_create(){
        
    }
    function create_category(){
        
    }
    function category_update(){
        
    }
    function category_delete(){
        
    }
    function create(){
        
    }
    function create_banner(){
        
    }
     function update(){
        
    }
     function update_banner(){
        
    }
     function delete_banner(){
        
    }
}
