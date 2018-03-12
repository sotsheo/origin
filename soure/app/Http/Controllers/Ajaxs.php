<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\History;
use App\Account;
use App\Prices;
use Illuminate\Support\Facades\Auth;
class Ajaxs extends Controller
{
    function index(){
    	$prices=Prices::get();
      $ready=Account::where("status",1)->paginate(9);
       
        foreach ($ready as $key => $value) {
             echo
             ("<div class='col-md-4'>
                <div class='card mb-4 box-shadow'>
                  <img class='img-thumbnail' src='img/pubg.jpg' data-holder-rendered='true'>
                    <div class='card-body'>
                        <form class='form-group'>

                            <select class='prices' style='margin: 5px 0' class='py-1'>
                              
                          ");
                          foreach ($prices as $key => $values){
                        
                          echo ("<option class='select action' value=' $values->ID '>".$values->Time."h/$values->price VND</option>");
                          }
                         
                            echo("</select>
                            <button type='button' class='btn btn-primary btn-sm btn-block ' data-toggle='modal' data-target='#myModal'>Thuê</button>
                        </form>
                    
                    </div>
                  
                </div>

              </div>");
        }
    }
     function time(Request $rq){
      $id = $_GET['id'];
      $prices=Prices::find($id);
      // kiểm tra đăng nhập
      if(!Auth::guard("client")->check()){
        return "error";
      }
      return ($prices->Time ."h/".$prices->price. "VND");
     }
     // thue acc
     function rent(){
       date_default_timezone_set('Asia/Ho_Chi_Minh');
      $id = $_GET['id'];
      $prices=Prices::find($id);
        if(!Auth::guard("client")->check()){
          return "Bạn chưa đăng nhập";
        }
        // lay 1 tai khoan dang status 1 
        $accounts=Account::where("status",1)->get();
        if(count($accounts)==0){
          return "Đã hết Account để thuê";
        }
        if(count($prices)==0){
          return "Bạn đã chọn sai giá tiền";
        }
        $history=new History();
        $history->id_account=$accounts[0]->id;
        $history->id_client=Auth::guard("client")->user()["id"];
        $time=date('Y-m-d H:i:s');
        $y =substr($time,0,4);
        $d =substr($time,5,2);
        $m =substr($time,8,2);
        $h =substr($time,11,2);
        $i =substr($time,14,2);
        $s =substr($time,17,2);
        $dateint = mktime($h+$prices->Time, $i, $s, $d, $m, $y);
        $date_clode=date('Y-m-d H:i:s',$dateint);
        $client=Client::find(Auth::guard("client")->user()["id"]);
        $price=$client['money'];
        if($price-$prices->price<0){
          return "Tài khoản bạn không đủ";
        }
        $client->money=$price-$prices->price;
        Auth::guard("client")->user()["money"]=$client->money;       
        $client->save();
         $acount=Account::find($accounts[0]->id);
            $acount->status=2;
            $acount->save();
        $history->event="thue tai khoan";
        $history->time=$prices->Time;
        $history->time_read=$time;
        $history->time_close=$date_clode;
        $history->save();
        return "Ok";
      
     }
     
}
