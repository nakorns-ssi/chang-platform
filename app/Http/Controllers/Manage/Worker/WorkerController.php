<?php

namespace App\Http\Controllers\Manage\Worker;
  
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session; 
use App\helper\util;
use App\Models\chang_prompt\Posts; 
class WorkerController  extends Controller
{ 
    protected $page_title = 'สำหรับช่าง';
    public function __construct()
    {
         //Session::put('url_before_login', back()); 
        // $this->middleware('AuthBuddyApp');
    } 
    
    public function  index(Request $request)
    {    
      $page_title = $this->page_title;
      $model =  [];
      $model_group =  [];
      $master_filter =[];
      $filter = $request->query('filter'); 
      
        //dd($model);
       return view('manage/worker/worker_index',compact('model','page_title'));
    }

    public function  worker_post(Request $request)
    {    
      $page_title = $this->page_title; 
      $model =   new Posts;  
      $model->price_min = 0;
      $model->price_max = 0;
      $model->posts_type = 'worker';
      
        //dd($model);
       return view('manage/worker/worker_post',compact('model','page_title'));
    }

    public function  worker_post_add(Request $request)
    {    
      $page_title = $this->page_title; 
      $model =   new Posts;  
      $model->price_min = 0;
      $model->price_max = 0;
      $model->posts_type = 'worker';
      
        //dd($model);
       return view('manage/worker/worker_post',compact('model','page_title'));
    }
    public function  worker_post_save(Request $request)
    {      
      $model =  [];
      $model_group =  [];  
      $post = $request->input('model');
      $source_file = $request->file('model')['pic_upload'];
      $account_id =  session('account')['account_id'];
      $display_name =  session('account')['profile_display_name'];
      $id =  $post['id'];
      //dd($post ,  $source_file ,$account_id  );
      if(!$id){   
        $model =  new Posts ;
        //dd($model  );
        $model ::unguard();
        $model->fill($post);
        $model->account_id = $account_id;
        $model->created_at = Carbon::now(); 
        $model->created_by = $account_id;
        $model->updated_at = Carbon::now(); 
        $model->updated_by = $account_id;  
        $model->updated_by_username = $display_name;  
        $model->posts_key = 'temp_'.date('ymd').uniqid();
        
        if($model->save()){  
            $model->posts_key =   util::gen_key($model->id) ;
            $model->save(); 
           
          Session::flash('alert', [
            'status' => 'success',
            'text' => 'บันทึกแล้ว!',
          ]);
        } 
      } 
     
      return redirect('/manage/profile') ;
    }
     
    
}
