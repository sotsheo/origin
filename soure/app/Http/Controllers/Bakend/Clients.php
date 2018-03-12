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

class Clients extends Controller
{
    function index(){
        $user=Client::paginate(9);
        $data=array();
        foreach ($user as $key => $values) {
            $i=0;
            $datas=History::where("id_client",$values->id)->get();
            foreach ($datas as $key => $value) {
                $i++;
            }
            $data[]=array("name"=>$values->name,"email"=>$values->name,"money"=>$values->money,"accounts"=>$i);

        }
        
        return view("back.client.index",["user"=>$data,"users"=>$user]);
    }
    function rent($id){
        $history=History::where("id_account",$id)->join('account', 'history.id_account', '=', 'account.id')->orderBy('history.id', 'desc')->get();
        $client=Client::where("id",$history[0]->id_client)->get();
        
        return view("back.client.rent",["client"=>$client,"history"=>$history]);
    }
    function add(){
        return view('back.client.add');
    }
}
