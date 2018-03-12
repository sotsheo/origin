<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\History;
use App\Account;
use App\Prices;
use Illuminate\Support\Facades\Auth;
class Frontend extends Controller
{

    function index(){
        $ready=Account::where("status",1)->paginate(9);
        $readys=Account::where("status",1)->get();
        $close=Account::where("status",2)->get();
        $prices=Prices::get();
    	return view("front.index",["ready"=>$ready,"close"=>$close,"readys"=>$readys,"prices"=>$prices]);
    }
     function acc_close(){
        // kiem tra xem ac nao het han 
       
        $ready=Account::where("status",1)->get();      
        $closes=Account::where("status",2)->paginate(9);
        $close=History::where("status",2)->join('account', 'history.id_account', '=', 'account.id')->select('history.*')->get();
        return view("front.acc_close",["ready"=>$ready,"close"=>$close,"closes"=>$closes]);
    }

    
    function login(){
    	return view("front.login");
    }
    function history(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');       

        $data=History::where("id_client",Auth::guard("client")->user()["id"])->where("account.status",2)
        ->join('account', 'history.id_account', '=', 'account.id')
            ->join('category', 'category.id', '=', 'account.id_category')->select('history.*', 'account.name as acount', 'category.name','account.password','account.status')->get();
        $datas=History::where("id_client",Auth::guard("client")->user()["id"])
        ->join('account', 'history.id_account', '=', 'account.id')
            ->join('category', 'category.id', '=', 'account.id_category')->select('history.*', 'account.name as acount', 'category.name','account.password','account.status')->get();
        $time_date=date('Y-m-d H:i:s');
        $time_close;
        foreach ($data as $key) {
            $time_close=$key["time_close"];
            $distance=strtotime($time_close)-strtotime($time_date);
            if($distance<=0){
                $account=Account::find($key["id_account"]);
                $account->status=1;
                $account->save();
            }
            if($distance>0){
                $account=Account::find($key["id_account"]);
                $account->status=2;
                $account->save();
            }
            //echo($key["id_account"]."<br>");
        }
         $readys=Account::where("status",1)->get();
        $close=Account::where("status",2)->get();
    	return view("front.history",["data"=>$datas,"close"=>$close,"readys"=>$readys]);
    }
    function registration(){
    	return view("front.registration");
    }
    function recharge(){
    	return view("front.recharge");
    }
     function action(Request $request){
        $email=$request->email;
        $password=$request->password;
            // su dung auth
        if (Auth::guard("client")->attempt(["name"=>$email,"password"=>$password])) {
            return redirect()->route("home");
        }
        else{
            
        }
       
    }
     function logout(){
        // kiem tra da dang nhap chua 
        if(Auth::guard("client")->check()){
            try{
                Auth::guard("client")->logout();
                return redirect("/");

            }
            catch(Exception $e){
                return redirect("/");
            }
            
            
        }
        else{   
            return redirect("/");
        }
    }
}
