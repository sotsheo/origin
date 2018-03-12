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

class Changes extends Controller
{
     function index(){
        // lay account co status =1;
        $account=Account::where("status",1)->get();
        $data=array();
        foreach ($account as $key => $value) {
            $history=History::where("id_account",$value->id)->orderBy('id', 'desc')->get();
            if(count($history)!=0){
                $rents=Timeexpired::where("id_account",$value->id)->get();
                if(count($rents)==0)
                {
                    $rent=new Timeexpired();
                    $rent->id_account=$value->id;
                    $rent->time_read=$history[0]->time_close;
                    $rent->save();                  
                }
                else{
                    $rent=Timeexpired::where("id_account",$value->id)->orderBy('Timeexpired.id', 'desc')->get();
                    $rents=Timeexpired::find($rent[0]->id);
                     $rents->time_read=$history[0]->time_close;
                     $rents->save();
                }
                
            }
        }
        $rentss=Timeexpired::get();
        foreach ($rentss as $key => $value) {
            $account=Account::find($value->id_account);
            $data[]=array("id"=>$value->id_account,"name"=>$account->name,"password"=>$account->password,"time_read"=>$value->time_read,"time_close"=>$account->time_change);
        }
        
       return view("back.change.index",["data"=>$data]);
    
    }
    function change(Request $request,$id){
         $status=$request->session()->get('status');
        $account=Account::find($id);
        $category=Category::get();
        // tao password goi y
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $size = strlen( $chars );
        $str='';
        for( $i = 0; $i < 10; $i++ ) {
          $str .= $chars[ rand( 0, $size - 1 ) ];
        }
        if(count($account)<1){
            echo ("Khong tim duoc tai khoan nao");
            return redirect("admin/change/list");
        }else{
            return view('back.change.edit',["account"=>$account,"category"=>$category,"suggested"=> $str,"status"=>$status]);
        }
    }
    function changeedit(Request $request){
        date_default_timezone_set('Asia/Ho_Chi_Minh');       
        $id=$request->id;
        $password=$request->password;
        $account=Account::find($id);
        if(count($account)<1){
            echo ("Khong tim duoc tai khoan nao");
            return redirect("admin/change/list");
        }
        else{
            $password_old=$account->password;
            if($password_old==$password){
                 $request->session()->flash('status', 'Mật khẩu chưa được thay đổi');
                 return redirect("admin/change/edit/$id");
            }
            else{
                $account->password=$password;
                $account->time_change=date('Y-m-d H:i:s');
                 $account->save();
                return redirect("admin/change/list");
            }
        }
        
    }
}
