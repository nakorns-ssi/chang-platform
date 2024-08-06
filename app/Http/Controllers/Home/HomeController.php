<?php

namespace App\Http\Controllers\Home;
  
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; 
use Session;

class HomeController  extends Controller
{ 
    public function __construct()
    {
      //  Session::put('url_before_login', back()); 
      //  $this->middleware('AuthBuddyApp' );
        
    }
    public function  home_index(Request $request)
    {   
       return view('home/home_index');
    }

    public function  about_us(Request $request)
    {   
       return view('home/about_us');
    } 
    
     
}
