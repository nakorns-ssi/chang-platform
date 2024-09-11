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
use App\Models\chang_prompt\Data_meta; 
use App\Models\Upload;
use App\Models\Account; 

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
      $page_title = $this->page_title.'ช่าง';
      $keyword = $request->query('q');
      $posts_type = 'worker';
     // $model = Cache::remember('home_posts', $seconds = (15*1), function () use ($posts_type) { 
        $paginate_num = 4; 
        $model = new Posts;
        $model =  $model->select('posts.*', 
        DB::raw('(select url from upload where status = "y" and upload.posts_id = posts.id  limit 1)  as img_thumbnail_url') ,
        DB::raw('(select upload_key from upload where status = "y" and upload.posts_id = posts.id limit 1)  as img_upload_key')   
        ) ;
        $model =  $model->where([
          'posts.status'=>'y' ,
          'posts.posts_type' =>  $posts_type ,
          'status_code'=>'published' ])
          ->orderby('posts.updated_at','desc')->paginate($paginate_num) ;
          $Account_list = []; 
     
       return view('posts/search_post' ,compact('model' ,'page_title' , 'posts_type','Account_list' ,'keyword'));
    }

    public function  post_project_owner(Request $request)
    {   
      $page_title = $this->page_title.'ผู้ว่าจ้าง';
      $keyword = $request->query('q');
      $posts_type = 'project_owner';
      // $model = Cache::remember('home_posts', $seconds = (15*1), function () use ($posts_type) { 
        $paginate_num = 4; 
        $model = new Posts;
        $model =  $model->select('posts.*', 
        DB::raw('(select url from upload where status = "y" and upload.posts_id = posts.id  limit 1)  as img_thumbnail_url') ,
        DB::raw('(select upload_key from upload where status = "y" and upload.posts_id = posts.id limit 1)  as img_upload_key')  
        ) ;
        $model =  $model->where([
          'posts.status'=>'y' ,
          'posts.posts_type' =>  $posts_type ,
          'status_code'=>'published' ])
          ->orderby('posts.updated_at','desc')->paginate($paginate_num) ;
          $Account_list = []; 

       return view('posts/search_post' ,compact('model' ,'page_title' , 'posts_type','Account_list' ,'keyword'));
    }
     

    public function  view_post(Request $request , $id ,$slug)
    {    
      $page_title = $this->page_title;
      $keyword = $request->query('q');
     // $post = $request->query('model');
      $posts_key = $id;
      $paginate_num = 1; 
      $model = Posts::where(['status'=>'y' ,'status_code'=>'published', 'posts_key'=> $posts_key])->first() ;  
      $model =  $model->select('posts.*', 
        DB::raw('(select account_code from account where account.id = posts.account_id limit 1)  as account_code') ,
        DB::raw('(select url from upload where status = "y" and upload.posts_id = posts.id  limit 1)  as img_thumbnail_url') ,
        DB::raw('(select upload_key from upload where status = "y" and upload.posts_id = posts.id limit 1)  as img_upload_key')  
        ) ;
        $model =  $model->where([
          'posts.status'=>'y' ,   
          'posts.posts_key'=>$posts_key ,   
          'status_code'=>'published' ])
          ->orderby('posts.updated_at','desc')->first() ; 
      if(!$model){  abort(404); }
      $upload = [];
      if($model->id){
        $upload = Upload::where('status','y') 
        ->where('posts_id',$model->id)  
        ->orderby('updated_at','desc')
        ->get();
      } 
 
      $account = Account::where([ 
        'status'=>'enable', 
        'account_code'=> $model->account_code ])->first() ; 
       //dd($upload);
       return view('posts/view_post',compact('model','upload','account', 'page_title','keyword'));
    }

    public function  search_post(Request $request )
    {    
      $page_title = $this->page_title;
      $keyword = $request->query('q');  
      DB::enableQueryLog();
      
      $paginate_num = 10; 
        $model = new Posts; 
        $model =  $model->select('posts.*', 
        DB::raw('(select url from upload where status = "y" and upload.posts_id = posts.id  limit 1)  as img_thumbnail_url') ,
        DB::raw('(select upload_key from upload where status = "y" and upload.posts_id = posts.id limit 1)  as img_upload_key')  
        ) ;
        $Data_meta = Data_meta::where( 'status','y')->select('account_id')
        ->where('meta_value', 'like', '%' . $keyword . '%')->groupBy('account_id')->get();
        $account_id_list = [];
        foreach($Data_meta as $val){
          $account_id_list[] = $val->account_id;
        }
        $Account_list = [];

        if(count($account_id_list)>0){
          $Account_list = Account::where( 'status','enable') 
          ->WhereIn('id',$account_id_list)->orderBy('last_active','desc')->take(10)->get();
        }
        
        // dd($Account_list ,$account_id_list );
        // if(count($account_id_list)>0){ 
        //   $model = $model->orWhere(function ($query) use ($account_id_list) {
        //     $query->WhereIn('posts.account_id',$account_id_list)   ; 
        //     })  ;
        // }
        

        $model = $model->where(function ($query) use ($keyword,$account_id_list) {
          $query->Where('posts.posts_content', 'like', '%' . $keyword . '%') 
          ->orWhere('posts.location_province', 'like', '%' . $keyword . '%')  
          ->orWhere('posts.location_amphoe', 'like', '%' . $keyword . '%')  
          ->orWhere('posts.location_district', 'like', '%' . $keyword . '%')   
          ->orWhereIn('posts.account_id',$account_id_list)   ; 
          })  ;
        $model =  $model->where([
          'posts.status'=>'y' , 
          'status_code'=>'published' ])
          ->orderby('posts.updated_at','desc')->paginate($paginate_num) ; 
         // dd(DB::getQueryLog());
       
       return view('posts/search_post',compact('model' ,'Account_list', 'page_title' ,'keyword'));
    }
 
     
    
}
