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
      $paginate_num = 4; 
      $model = new Posts;
      $model =  $model->leftJoin('upload', 'posts.id', '=', 'upload.posts_id') ;
      $model =  $model->select('posts.*', 'upload.url as img_thumbnail_url' ,'upload.upload_key as img_upload_key' ) ;
      $model =  $model->where([
        'posts.status'=>'y' ,   
        'status_code'=>'published' ])
        ->orderby('posts.updated_at','desc')->paginate($paginate_num) ;
      $Posts =  $model ;
      // dd($Posts  );
      

       return view('home/home_index' ,compact('model','Posts'));
    }

    public function  about_us(Request $request)
    {   
       return view('home/about_us');
    } 
    
     
}
