<?php

namespace App\Http\Controllers\Home;
  
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; 
use Session;
use Illuminate\Support\Facades\Cache;
use App\Models\Account;
use App\helper\helper_account;
use App\Models\chang_prompt\Posts;
use App\Models\Upload;

class HomeController  extends Controller
{ 
    public function __construct()
    {
      //  Session::put('url_before_login', back()); 
      //  $this->middleware('AuthBuddyApp' );
        
    }
    public function  home_index(Request $request)
    {   
     // Cache::flush();
     // $model = Cache::remember('home_posts', $seconds = (15*1), function () {
        
          $Account_list = []; 
          $Account_list = Account::where( 'status','enable')->orderBy('last_active','desc')->take(10)->get();
       
       return view('home/home_index' ,compact( 'Account_list'));
    }

    public function  about_us(Request $request)
    {   
       return view('home/about_us');
    } 
    
     
}
