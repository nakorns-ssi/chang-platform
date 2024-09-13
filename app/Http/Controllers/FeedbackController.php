<?php

namespace App\Http\Controllers;
  
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
use App\Models\Feedback;
use App\Models\Upload;
use App\Models\Account; 

class FeedbackController  extends Controller
{ 
    protected $page_title = 'แนะนำติ-ชมบริการ';
    protected $posts_type = 'feedback';
    public function __construct()
    {
         //Session::put('url_before_login', back()); 
        // $this->middleware('AuthBuddyApp');
    } 
 
    public function  feedback_save(Request $request)
    {   
      $page_title = $this->page_title;
      $post = $request->input('model');
      $session_id = session()->getId();
      if($post['rating']){ 
        $tag = 'แนะนำบริการ';
        $model = Feedback::where([ 'tag'=> $tag ,'session_id' => $session_id ])->delete() ;   
        foreach($post['rating'] as $mete_key => $meta_value ){
          $mete_key = base64_decode($mete_key) ; 
          $dataset =[ 
            "tag" =>  $tag,   
            "meta_key" => $mete_key,  
            "meta_value" =>$meta_value,   
            "session_id" => $session_id , 
            "updated_at" => Carbon::now()
          ];
          $data_insert[] = $dataset; 
        }
         
        foreach (array_chunk($data_insert,1000) as $t) : 
          $model = Feedback::insert($t); 
        endforeach;
      }
      return redirect()->back() ;
    }
  
    
}
