<?php

namespace App\Http\Controllers\Posts;
  
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session; 
use App\helper\util;
use App\helper\gcp\helper_upload;
use App\Models\chang_prompt\Posts; 
use App\Models\chang_prompt\Posts_meta; 
use App\Models\Upload; 
class PostsController  extends Controller
{ 
    protected $page_title = 'โพสต์';
    protected $posts_type = 'worker';
    public function __construct()
    {
         //Session::put('url_before_login', back()); 
        // $this->middleware('AuthBuddyApp');
    } 
     

    public function  view_post(Request $request , $id)
    {    
      $page_title = $this->page_title;
     // $post = $request->query('model');
      $post_id = $id;
      $paginate_num = 1;
      $account_id =  session('account')['account_id'];
      $account_display_name =  session('account')['profile_display_name']; 
      $model = Posts::where(['status'=>'y' , 'id'=> $post_id])->first() ;   

      $upload = Upload::where('status','y') 
        ->where('posts_id',$post_id)  
        ->orderby('updated_at','desc')
        ->get(); 
      
       //dd($upload);
       return view('posts/view_post',compact('model','upload','page_title'));
    }
 
     
    
}
