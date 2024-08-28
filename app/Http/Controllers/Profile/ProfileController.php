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
class ProfileController  extends Controller
{ 
    protected $page_title = 'โปรไฟล์';
    protected $posts_type = 'profile';
    public function __construct()
    {
         //Session::put('url_before_login', back()); 
        // $this->middleware('AuthBuddyApp');
    } 
 
    public function  view_profile(Request $request , $id ,$slug)
    {    
      $page_title = $this->page_title; 
     // $post = $request->query('model');
      $account_code = $id; 
      $model = Account::where(['status'=>'enable']) ;  
      // $model =  $model->select('posts.*', 
      //   DB::raw('(select account_code from account where account.id = posts.account_id limit 1)  as account_code') ,
      //   DB::raw('(select url from upload where upload.posts_id = posts.id limit 1)  as img_thumbnail_url') ,
      //   DB::raw('(select upload_key from upload where upload.posts_id = posts.id limit 1)  as img_upload_key')  
      //   ) ;
        $model =  $model->where([ 
          'account_code'=>$account_code ,     ])
          ->orderby('updated_at','desc')->first() ; 
      if(!$model){  abort(404); }
      $upload = [];
     
       //dd($upload);
       return view('profile/view_profile',compact('model','page_title'));
    }
 
     
    
}
