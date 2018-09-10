<?php


namespace App\Http\Controllers\Backend;
use App\Newsnew;
use App\Category_news;
use Illuminate\Http\Request;
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


      function create(){
        return view("backend.news.create");
      }
      function create_news(Request $request){
        $news=new Newsnew();
        $news->name=$request->name;
        $news->url=$request->url;
        $news->news_sortdesc=$request->news_sortdesc;
        $news->status=0;
        if($request->status){
            $news->status=1;
        }       
        $file=$request->file("img");
        $file->move(public_path('upload\tintuc'),$file->getClientOriginalName());
        $news->img=$file->getClientOriginalName();
        $news->orders=$request->orders;
        $news->desc=$request->desc;
        $news->id_category=$request->id_category;
        $news->date_public=date("y-m-d");
        $news->user="admin";
        $news->save();
        return redirect('admin/news/index');
      }

       function update($id,Request $request){
        $news=Newsnew::find($id);
        if($news){
            $request->session()->flash('message', 'Không thể cập nhật');
            return view("backend.news.update",["news"=>$news]);
        }
        return redirect('admin/news/index');
        
     }
     function update_news(Request $request){
        $news=Newsnew::find( $request->id);
        $news->name=$request->name;
        $news->url=$request->url;
        $news->news_sortdesc=$request->news_sortdesc;
        $news->status=0;
        if($request->status){
            $news->status=1;
        }       
        
            $file=$request->file("img");
            if($file){
                $file->move(public_path('upload\tintuc'),$file->getClientOriginalName());
            $news->img='upload\tintuc'.$request->img;
            }
        $news->orders=$request->orders;
        $news->date_public=date("y-m-d");
        $news->desc=$request->desc;
        $news->user="admin";     
        $news->id_category=$request->id_category;
        $news->save();      
        return redirect('admin/news/index');
     }
     function delete_news(Request $request,$id){
        $news=Newsnew::find($id);
        if($news){
            $request->session()->flash('message', 'Không co dữ liệu để xóa');
            $news->delete();
            return redirect('admin/news/index');
        }
        
        return redirect('admin/news/index');
     }
}
