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

class Home extends Controller
{
     function index(){      
        $account=Account::paginate(9);

        return view("back.index",["acount"=>$account]);
    }
    function admin_action(Request $request){
        $email=$request->email;
        $password=$request->password;
        if (Auth::attempt(["email"=>$email,"password"=>$password])) {
            return redirect("admin/home");
        }
        return redirect("admin/login");
        
    }
    function login(){

        return view("back.login");
    }
    
}
