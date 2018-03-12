<?php

namespace App\Http\Controllers\Bakend;

use Illuminate\Http\Request;
use App\Client;
use App\History;
use App\Account;
use App\Prices;
use App\User;
use App\Category;
use App\Timeexpired;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class Categorys extends Controller
{
     // category 
    function index(Request $request){
    	$status=$request->session()->get('status');
        $category=Category::paginate(9);
        return view("back.category.index",["category"=>$category,"status"=>$status]);
    }
     function add(){
        return view("back.category.add");
    }
    function edit(Request $request,$id){
    	$category=Category::find($id);
    	if(count($category)<0){
    		$request->session()->flash('status', 'Không tìm thấy category nào ');
    		return redirect("admin/category/list");
    	}	
    	return view("back.category.edit",["category"=>$category]);
    }
    function edit_category(Request $request){
        if(!$request->id){
            $request->session()->flash('status', 'Không tìm thấy category nào ');
            return redirect("admin/category/list");
        }
    	$category=Category::find($request->id);
    	if(count($category)<0){
    		$request->session()->flash('status', 'Không tìm thấy category nào ');
    		return redirect("admin/category/list");
    	}
    	else{
    		$category->name=$request->name;
    		$category->save();
    		$request->session()->flash('status', 'Đã edit category '.$category->name);
    		return redirect("admin/category/list");
    	}
    }
    function add_actegory(Request $request){
    	$name=$request->name;
    	$category=new Category();
    	$category->name=$name;
    	$category->save();
    	$request->session()->flash('status', 'Thêm thành công Category '.$name);
    	return view("back.category.index");
    }
    function delete(Request $request,$id){
    	$category=Category::find($id);
    	if(count($category)<0){
    		$request->session()->flash('status', 'Không tìm thấy category nào ');
    		return redirect("admin/category/list");
    	}
    	else{
    		$category->delete();
    		$request->session()->flash('status', 'Đã xóa category '.$category->name);
    		return redirect("admin/category/list");
    	}
    }
}
