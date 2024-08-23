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
    protected $posts_type = 'worker';
    public function __construct()
    {
         //Session::put('url_before_login', back()); 
         $this->middleware('AuthManage');
    } 
     

    public function  worker_post(Request $request)
    {    
      $page_title = $this->page_title;
      $paginate_num = 5;
      $account_id =  session('account')['account_id'];
      $account_display_name =  session('account')['profile_display_name']; 
      $model = new Posts;
      $model =  $model->leftJoin('upload', 'posts.id', '=', 'upload.posts_id') ;
      $model =  $model->select('posts.*', 'upload.url as img_thumbnail_url' ,'upload.upload_key as img_upload_key' ) ;
      $model =  $model->where([
        'posts.status'=>'y' ,  
        'posts_type'=> $this->posts_type,
        'posts.account_id' => $account_id ])
        ->orderby('posts.updated_at','desc')->paginate($paginate_num) ;
       
      
     //dd($model);
       return view('manage/worker/worker_post_index',compact('model','page_title'));
    }

    public function  worker_post_add(Request $request)
    {    
      $page_title = $this->page_title; 
      $upload = [];
      $account_id =  session('account')['account_id'];
      $account_display_name =  session('account')['profile_display_name'];
      $model =  Posts::where([
        'status'=>'y' , 
        'status_code'=> 'draft',
        'account_id' => $account_id ])->first();
      if(!$model){
        $model =   new Posts;  
        $model->price_min = 0;
        $model->price_max = 0;
        $model->posts_type =  $this->posts_type;  
        $model->status_code =  'draft';  
        $model->account_id = $account_id;
        $model->created_at = Carbon::now(); 
        $model->created_by = $account_id;
        $model->updated_at = Carbon::now(); 
        $model->updated_by = $account_id;  
        $model->updated_by_username = $account_display_name;  
        $model->posts_key = 'temp_'.date('ymd').uniqid(); 
        if($model->save()){  
          $model->posts_key =  util::gen_key($model->id) ; 
          $model->save();  
      } 

      }
      return redirect('/manage/worker/post/edit?id='. $model->posts_key) ;
     
       // dd($upload);
      // return view('manage/worker/worker_post_frm',compact('model','page_title' ,'upload'));
    }
    public function  worker_post_edit(Request $request)
    {
      $page_title = $this->page_title;
      $account_id =  session('account')['account_id'];
      $key = $request->query('id');
    //  DB::enableQueryLog();
      $model = Posts::where([
        'status'=>'y' , 
        'posts_key'=> $key,
        'account_id' => $account_id ])->first() ;
      //  dd(DB::getQueryLog());
      if(!$model){
        abort(404);
      }
      if($model->status_code ==  'draft'){
        $model->status_code =  'published';
      }
        // dd($model->id);
      $upload = Upload::where('status','y') 
        ->where('posts_id',$model->id)  
        ->orderby('updated_at','desc')
        ->get();  
          
        //dd($model);
       return view('manage/worker/worker_post_frm',compact('model','page_title' ,'upload'));
    }
    public function  worker_post_save(Request $request)
    {      
      $model =  [];
      $model_group =  [];  
      $post = $request->input('model');
      $working_area =  $request->input('working_area'); 
      $account_id =  session('account')['account_id'];
      $account_display_name =  session('account')['profile_display_name'];
      $id =  $post['id'];

      if($post['price_min'] != $post['price_max']){
        $post['price']  = min($post['price_min'] ,$post['price_max']);
      }
     // dd( $id , $model   );
     
       
      if($id){ //update  
        $model =  Posts::where('id',$id)->first();
        //dd($model  );
        $model ::unguard();
        $model->fill($post);       
        $model->updated_at = Carbon::now(); 
        $model->updated_by = $account_id;  
        $model->updated_by_username = $account_display_name; 
        $model->save(); 

       } else{ //create  
        $model =  new Posts ;
        // dd($model , $working_area ,$post , $request->file() );
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
          $model->posts_key =  util::gen_key($model->id) ;
          $model->save();
        }
        
      }   
        if(isset($working_area['district'] )) {
          foreach($working_area['district'] as $val){ 
            $data = json_decode($val);   
            $model->location_district = $data->district;
            $model->location_amphoe = $data->amphoe;
            $model->location_province = $data->province;
            $model->location_zipcode = $data->zipcode;
            $model->save();  
          }
        }
         
      
      $source_file = [];
      if(isset( $request->file('model')['pic_upload'])){
        $source_file = $request->file('model')['pic_upload'];
      }

     //dd($source_file,$request->file('model')['pic_upload']);
     
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
     
       return redirect('/manage/worker/post/edit?id='.$model->posts_key) ;
    }
     
    
}
