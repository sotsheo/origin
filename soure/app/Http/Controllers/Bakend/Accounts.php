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

class Accounts extends Controller
{
     function index(Request $request){
        $status=$request->session()->get('status');
        $account=account::paginate(9);
        return view("back.account.index",["account"=>$account,"status"=>$status]);
    }
    function view_addaccount(){
        $category=Category::get();
        return view("back.account.add",["category"=>$category]);
    }
    function add_account(Request $request){
        $name=$request->name;
        $password=$request->password;
        $category=$request->category;
        $account=new Account();
        $account->name=$name;
        $account->password=$password;
        $account->id_category=$category;
        $account->status=1;
        $account->save();
         return redirect("admin/account/list");
    }
    function view_editaccount($id){
        $account=Account::find($id);
        $category=Category::get();
        return view("back.account.edit",["category"=>$category,"account"=>$account]);
    }
     function edit_account(Request $request){
        $id=$request->id;
        $name=$request->name;
        $password=$request->password;
        $category=$request->category;
        $account=Account::find($id);
        $account->name=$name;
        $account->password=$password;
        $account->id_category=$category;
        $account->save();
        $request->session()->flash('status', 'Edit  thành công!');        
        return redirect("admin/account/list");
    }
     function delete_account(Request $request,$id){         
        $account=Account::find($id);
        if($account->status==2){
            $request->session()->flash('status', 'Tài khoản đang được thuê không thể xóa!');
            return redirect("admin/account/list");
        }
        else{
            $account->delete();
        }
        $request->session()->flash('status', 'Xoá thành công!');
        return redirect("admin/account/list");
    }
}
