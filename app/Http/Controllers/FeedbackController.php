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

    public function  feedback_index(Request $request)
    {    
      return view('component/Feedback/Feedback'); 
    }
 
    public function  feedback_save(Request $request)
    {   
      $page_title = $this->page_title;
      $post = $request->input('rating');
      $session_id = session()->getId();
      //dd( $post);
      if($post){
        $tag = 'แนะนำบริการ';
        $model = Feedback::where([ 'tag'=> $tag ,'session_id' => $session_id ])->delete() ;   
        foreach($post as $mete_key => $meta_value ){
         // $mete_key = base64_decode($mete_key) ; 
         foreach($meta_value as $key => $value ){
          $dataset =[ 
            "tag" =>  $tag,   
            "meta_key" => $key,  
            "meta_value" =>$value,   
            "session_id" => $session_id , 
            "updated_at" => Carbon::now()
          ];
         } 
          ///dd($dataset); 
          $data_insert[] = $dataset; 
        }
         
        foreach (array_chunk($data_insert,1000) as $t) : 
          $model = Feedback::insert($t); 
        endforeach;
      } 
      return view('component/Feedback/Rating_thankyou');
      //return redirect()->back() ;
    }
  
    
}
