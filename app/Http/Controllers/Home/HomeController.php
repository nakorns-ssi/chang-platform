<?php

namespace App\Http\Controllers\Home;
  
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; 
use Session;
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
      $Posts =  Posts::where(['status_code'=>'published'])->take(4)->get();
      $model = $Posts ;
       foreach( $Posts as $val):
        $val->img_thumbnail = Upload::where('status','y') 
          ->where('posts_id',$val->id)  
          ->orderby('updated_at','desc')
          ->first(); 
       endforeach;
     // dd($Posts[0]->img_thumbnail->url );
      

       return view('home/home_index' ,compact('model','Posts'));
    }

    public function  about_us(Request $request)
    {   
       return view('home/about_us');
    } 
    
     
}
