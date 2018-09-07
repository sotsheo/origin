<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Backend_menu;
class Admin extends Controller
{
    public function home(){
    	
    	return view("backend.home");
    }
}
