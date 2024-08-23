<?php

namespace App\Http\Controllers\Posts;
  
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Cache;
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

    
    public function  post_worker(Request $request)
    {   
      $page_title = $this->page_title; 
      $posts_type = 'worker';
      $model = Cache::remember('home_posts', $seconds = (15*1), function () use ($posts_type) { 
        $paginate_num = 4; 
        $model = new Posts;
        $model =  $model->leftJoin('upload', 'posts.id', '=', 'upload.posts_id') ;
        $model =  $model->select('posts.*', 'upload.url as img_thumbnail_url' ,'upload.upload_key as img_upload_key' ) ;
        $model =  $model->where([
          'posts.status'=>'y' ,
          'posts.posts_type' =>  $posts_type ,
          'status_code'=>'published' ])
          ->orderby('posts.updated_at','desc')->paginate($paginate_num) ;
        return  $model;
      }); 
      // dd($Posts  ); 
       return view('posts/search_post' ,compact('model' ,'page_title' , 'posts_type'));
    }

    public function  post_project_owner(Request $request)
    {   
      $page_title = $this->page_title; 
      $posts_type = 'project_owner';
      $model = Cache::remember('home_posts', $seconds = (15*1), function () use ($posts_type) { 
        $paginate_num = 4; 
        $model = new Posts;
        $model =  $model->leftJoin('upload', 'posts.id', '=', 'upload.posts_id') ;
        $model =  $model->select('posts.*', 'upload.url as img_thumbnail_url' ,'upload.upload_key as img_upload_key' ) ;
        $model =  $model->where([
          'posts.status'=>'y' ,
          'posts.posts_type' =>  $posts_type ,
          'status_code'=>'published' ])
          ->orderby('posts.updated_at','desc')->paginate($paginate_num) ;
        return  $model;
      }); 
      // dd($Posts  ); 
       return view('posts/search_post' ,compact('model' ,'page_title' , 'posts_type'));
    }
     

    public function  view_post(Request $request , $id ,$slug)
    {    
      $page_title = $this->page_title;
     // $post = $request->query('model');
      $posts_key = $id;
      $paginate_num = 1; 
      $model = Posts::where(['status'=>'y' , 'posts_key'=> $posts_key])->first() ;   

      $upload = [];
      if($model->id){
        $upload = Upload::where('status','y') 
        ->where('posts_id',$model->id)  
        ->orderby('updated_at','desc')
        ->get();
      } 
       //dd($upload);
       return view('posts/view_post',compact('model','upload','page_title'));
    }

    public function  search_post(Request $request )
    {    
      $page_title = $this->page_title;
      $post = $request->query('q');
      $post_id = $id;
      $paginate_num = 1; 
      $model = Posts::where(['status'=>'y' ])->first() ;   

  
      
       //dd($upload);
       return view('posts/search_post',compact('model','upload','page_title'));
    }
 
     
    
}
