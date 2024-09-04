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
        $paginate_num = 4; 
        $model = new Posts; 
        $model =  $model->select('posts.*', 
        DB::raw('(select url from upload where status = "y" and upload.posts_id = posts.id  limit 1)  as img_thumbnail_url') ,
        DB::raw('(select upload_key from upload where status = "y" and upload.posts_id = posts.id limit 1)  as img_upload_key')  
        ) ;
        $model =  $model->where([
          'posts.status'=>'y' ,   
          'status_code'=>'published' ])
          ->orderby('posts.updated_at','desc')->paginate($paginate_num) ;
      //   return  $model;
      // });
     // $Posts =  $model ;
      // dd($Posts  );
      

       return view('home/home_index' ,compact('model'));
    }

    public function  about_us(Request $request)
    {   
       return view('home/about_us');
    } 
    
     
}
