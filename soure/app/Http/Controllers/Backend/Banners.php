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
        return view("backend.banner.index");
    }
     function category(){
        return view("backend.banner.category");
    }
    function category_create(){
         return view("backend.banner.category_create");
    }
    function create_category(Request $request){
        $category =new Banner_category();
        $category->name=$request->name;
        $category->url=$request->url;
        $category->news_sortdesc=$request->news_sortdesc;
        $category->status=0;
        if($request->status){
            $category->status=1;
        }       
        $file=$request->file("img");
        $file->move(public_path('upload\banner'),$file->getClientOriginalName());
        $category->img=$file->getClientOriginalName();
        $category->orders=$request->orders;
        $category->desc=$request->desc;
        $category->date_public=date("y-m-d");
        $category->user="admin";

        $category->save();
        return redirect('admin/banner/category');

    }
    function category_update($id){
         $category =Banner_category::find($id);
          return view("backend.banner.category_update",["category"=>$category]);
    }
    function update_category(Request $request){
        $category=Banner_category::find( $request->id);
        $category->name=$request->name;
        $category->url=$request->url;
        $category->news_sortdesc=$request->news_sortdesc;
        $category->status=0;
        if($request->status){
            $category->status=1;
        }       
        
            $file=$request->file("img");
            if($file){
                $file->move(public_path('upload\banner'),$file->getClientOriginalName());
            $category->img='upload\banner'.$request->img;
            }
        $category->orders=$request->orders;
        $category->date_public=date("y-m-d");
         $category->desc=$request->desc;
        $category->user="admin";
        $category->save();      
        return redirect('admin/banner/category');
    }
    function category_delete($id){
        $category=Banner_category::find($id);
        if($category){
            $request->session()->flash('message', 'Không co dữ liệu để xóa');
            $category->delete();
            return redirect('admin/banner/category');
        }
        
        return redirect('admin/banner/category');
    }
    function create(){
         return view("backend.banner.create");
    }
    function create_banner(Request $request){
         $banner =new Banner();
        $banner->name=$request->name;
        $banner->url=$request->url;
        $banner->news_sortdesc=$request->news_sortdesc;
        $banner->status=0;
        if($request->status){
            $banner->status=1;
        }       
        $file=$request->file("img");
        $file->move(public_path('upload\banner'),$file->getClientOriginalName());
        $banner->img=$file->getClientOriginalName();
        $banner->orders=$request->orders;
        $banner->desc=$request->desc;
        $banner->category_banner=$request->category_banner;
        $banner->date_public=date("y-m-d");
        $banner->user="admin";

        $banner->save();
        return redirect('admin/banner/index');
    }
     function update($id){
         $banner =Banner::find($id);
          return view("backend.banner.update",["banner"=>$banner]);
    }
     function update_banner(){
        
    }
     function delete_banner(){
        
    }
}
