<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Backend_menu;

class Backend_menus extends Controller
{
     function index(){   
        $menu= Backend_menu::orderBy('id', 'ASC')->get(); 
        return view("backend.menu.index",["menus"=>$menu]);
    }
    function create(){	
    	return view("backend.menu.create");
    }

    function create_menu(Request $request){
    	
    	$this->validate($request,[
    		'name'=>'required|min:3|max:100'
    	],
    	[
    		'name.required'=>"Bạn chưa nhập tên",
    		'name.min'=>"Tên phải lớn hơn 3 kí tự"
    	]
    	);
    	$menu=new Backend_menu();
    	$menu->name = $request->name;
    	$menu->id_parent=$request->id_parent;
    	$menu->link=$request->link;
    	$menu->icon=$request->icon;
	    $menu->save();
	   return redirect('admin/home');
    }
     function update($id){
         $menu= Backend_menu::find($id); 

         return view("backend.menu.update",["menu_item"=>$menu]);
    }
    function update_menu(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3|max:100'
        ],
        [
            'name.required'=>"Bạn chưa nhập tên",
            'name.min'=>"Tên phải lớn hơn 3 kí tự"
        ]
        );

        if(!$request->id){
             return redirect('admin/menu/index');
        }
        $menu= Backend_menu::find($request->id);
        $menu->name = $request->name;
        if($request->id_parent== $menu->id){
           $menu->id_parent=0;
        }else {
             $menu->id_parent=$request->id_parent;
        }
        
        $menu->link=$request->link;
        $menu->icon=$request->icon;
        $menu->save();
        return redirect('admin/menu/index');
    }
}
