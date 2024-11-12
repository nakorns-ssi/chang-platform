<?php

namespace App\Http\Controllers\Profile;
  
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
use App\Models\Upload; 
use App\Models\Account; 
use App\Models\chang_prompt\Posts;
use App\Models\chang_prompt\Data_meta;

class ProfileController  extends Controller
{ 
    protected $page_title = 'โปรไฟล์';
    protected $posts_type = 'profile';
    public function __construct()
    {
         //Session::put('url_before_login', back()); 
        // $this->middleware('AuthBuddyApp');
    } 
 
    public function  profile_index(Request $request , $id ,$slug)
    {
      $page_title = $this->page_title;
      $paginate_num = 6;
     // $post = $request->query('model');
      $account_code = $id; 
      $model = Account::where(['status'=>'enable']) ;   
        $model =  $model->where([ 
          'account_code'=>$account_code ])
          ->orderby('updated_at','desc')->first() ; 
      if(!$model){  abort(404); }
      $upload = [];

      $posts =  Posts::select('posts.*', 
        DB::raw('(select account_code from account where account.id = posts.account_id limit 1)  as account_code') ,
        DB::raw('(select url from upload where upload.posts_id = posts.id limit 1)  as img_thumbnail_url') ,
        DB::raw('(select upload_key from upload where upload.posts_id = posts.id limit 1)  as img_upload_key')  
        ) ;
      $posts =  $posts->where([
        'posts.status'=>'y' ,   
        'account_id'=> $model->id ,   
        'posts.status_code'=>'published' ])
        ->orderby('posts.updated_at','desc')->paginate($paginate_num) ;
      $worker_profile = [];
      $Data_meta = Data_meta::where([
        'tag'=> 'worker_profile' ,
        'account_id'=> $model->id ,
        ])->get();
        foreach($Data_meta as $val){
          $worker_profile[$val->meta_key][] = $val->meta_value;
        }
       $account_id =  $model->id;
       //dd($worker_profile);
       return view('profile/profile_index',compact('model','posts' ,'account_id', 'page_title'));
    }

    public function  worker_project_view(Request $request , $id  )
    {    
      $model = new Posts;
      $posts_type = 'worker_project'; 
      $model =  $model->select('posts.*', 
        DB::raw('(select account_code from account where account.id = posts.account_id limit 1)  as account_code') ,
        DB::raw('(select url from upload where status = "y" and upload.posts_id = posts.id  limit 1)  as img_thumbnail_url') ,
        DB::raw('(select upload_key from upload where status = "y" and upload.posts_id = posts.id limit 1)  as img_upload_key')  
        ) ;
        $model =  $model->where([
          'posts.status'=>'y' ,  
          'posts.posts_type' =>  $posts_type , 
          'posts.posts_key'=>$id ,   
          'status_code'=>'published' ])
          ->orderby('posts.updated_at','desc')->first() ; 
      $upload =  Upload::where( ['status'=>'y','ref_id'=> $id])->get(); 
      //  dd($model);
       return view('profile/worker_project_view',compact('model','upload'));
    }
 
     
    
}
