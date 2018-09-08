<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Category_news;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
class News extends Controller
{
     function index(){
     	return view("backend.news.index");
     }
     function category_create(){
     	return view("backend.news.category_create");
     }
       function newscategory(){
       	$category=Category_news::all();
     	return view("backend.news.category",["categorys"=>$category]);
     }

     function create_category(Request $request){
     	$category=new Category_news();

     	$category->name=$request->name;
     	$category->url=$request->url;
     	$category->news_sortdesc=$request->news_sortdesc;
     	$category->status=0;
     	if($request->status){
			$category->status=1;
     	}    	
     	$file=$request->file("img");
     	$file->move(public_path('upload\tintuc'),$file->getClientOriginalName());
     	$category->img=$file->getClientOriginalName();
     	$category->orders=$request->orders;
        $category->desc=$request->desc;
     	$category->date_public=date("y-m-d");
     	$category->user="admin";

     	$category->save();
     	return redirect('admin/news/newscategory');
     }
     function category_update($id,Request $request){
     	$category=Category_news::find($id);
     	if($category){
     		$request->session()->flash('message', 'Không thể cập nhật');
     		return view("backend.news.category_update",["category"=>$category]);
     	}
		return redirect('admin/news/newscategory');
		
     }
     function update_category(Request $request){
     	$category=Category_news::find( $request->id);
     	$category->name=$request->name;
     	$category->url=$request->url;
     	$category->news_sortdesc=$request->news_sortdesc;
     	$category->status=0;
     	if($request->status){
			$category->status=1;
     	}    	
     	
     		$file=$request->file("img");
     		if($file){
     			$file->move(public_path('upload\tintuc'),$file->getClientOriginalName());
     		$category->img='upload\tintuc'.$request->img;
     		}
     	$category->orders=$request->orders;
     	$category->date_public=date("y-m-d");
         $category->desc=$request->desc;
     	$category->user="admin";
     	$category->save();  	
     	return redirect('admin/news/newscategory');
     }
      function category_delete(Request $request,$id){
      	$category=Category_news::find($id);
      	if($category){
      		$request->session()->flash('message', 'Không co dữ liệu để xóa');
      		$category->delete();
     		return redirect('admin/news/newscategory');
     	}
      	
      	return redirect('admin/news/newscategory');
      }
}
