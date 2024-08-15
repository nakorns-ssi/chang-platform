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
use App\helper\gcp\helper_upload;
use App\Models\chang_prompt\Posts; 
use App\Models\chang_prompt\Posts_meta; 
use App\Models\Upload; 
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
      
        //dd($model);
       return view('manage/worker/worker_post',compact('model','page_title'));
    }

    public function  worker_post_add(Request $request)
    {    
      $page_title = $this->page_title; 
      $model =   new Posts;  
      $model->price_min = 0;
      $model->price_max = 99;
      $model->posts_type = 'worker';
      
        //dd($model);
       return view('manage/worker/worker_post',compact('model','page_title'));
    }
    public function  worker_post_save(Request $request)
    {      
      $model =  [];
      $model_group =  [];  
      $post = $request->input('model');
      
      $account_id =  session('account')['account_id'];
      $account_display_name =  session('account')['profile_display_name'];
      $id =  $post['id'];
       
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
        $model->updated_by_username = $account_display_name;  
        $model->posts_key = 'temp_'.date('ymd').uniqid();
        
        if($model->save()){  
            $model->posts_key =   util::gen_key($model->id) ;
            $model->save();  
        } 
      } 
      
      $source_file = $request->file('model')['pic_upload'];
     
      foreach ($source_file as $key => $fileitem) {
        $ext = pathinfo($fileitem->getClientOriginalName(), PATHINFO_EXTENSION);
        $imageProperties = getimagesize($fileitem);
        $mime = $imageProperties['mime'];
    
        $file_path = $fileitem->getRealPath();
        $param = [
          'filename' =>  'posts_'.$account_id.'_'.uniqid().'_'.time().'_'.$key.'.'.$ext ,
          'bucketName' => 'fdc-upload',
          'upload_path' => 'public',  
        ];
        //dd($file_path ,$fileitem );
        $dataset = helper_upload::upload_select_path($param,$file_path);
       // dd($dataset  );  
          $tag = 'posts';   
           $dataset =[   
            "tag"=>  $tag , 
            "upload_key"=>'temp_'.date('ymd').uniqid() , 
            'account_id'=>$account_id,
            'ref_id'=> $model->posts_key, 
            'posts_id'=> $model->id, 
            'content_type' => $mime,
            "file_name"=>  $dataset["file_name"] ,
            "folder_name"=> $dataset["folder_name"] ,
            "url"=>  $dataset["url"],  
            "created_by"=> $account_id  ,
            "created_at"=> Carbon::now() ,
            "updated_by"=> $account_id  ,
            "updated_at"=> Carbon::now()  ,
            "updated_by_username"=> $account_display_name  ,
         ];
           $model =   new Upload ;  
           $model ::unguard();
           $model->fill($dataset);  
           $model->upload_key = 'temp_'.date('ymd').uniqid();
           if($model->save()){
              $model->upload_key = date('ymd') . $model->id . substr(time(), 5);
              $model->save();
              
           }
       }

      

      if($model){
        Session::flash('alert', [
           'status' => 'success',
           'text' => 'บันทึกข้อมูลแล้ว!' . '  , ' . date('H:i'),
       ]); 
       }else{
        Session::flash('alert', [
           'status' => 'error',
           'text' => 'ข้อมูลไม่ถูกต้อง',
       ]); 
        } 
     
     // return redirect('/manage/profile') ;
    }
     
    
}
