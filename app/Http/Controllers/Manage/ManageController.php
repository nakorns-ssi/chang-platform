<?php

namespace App\Http\Controllers\Manage;
  
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session; 
use App\helper\util; 
use App\Models\Account; 
use App\Models\Upload;
use App\helper\gcp\helper_upload;
use App\helper\helper_account;
use App\Models\chang_prompt\Data_meta;
use App\Models\chang_prompt\Posts; 

class ManageController  extends Controller
{ 
    public function __construct()
    {
         //Session::put('url_before_login', back()); 
          $this->middleware('AuthManage');
    } 
    public function  regis_index(Request $request)
    { 
      $step = $request->query('step');
      $step_total = 3;
      if(!is_numeric($step)){
        $step = 1; 
        session()->forget('manage.regis');
      } 
      $model =  null; 
      $model_worker_profile = null;
      $paginate_num = 50; 
      $account = session('account');
      $account_id = session('account')['account_id']; 
      $model = Account::where(['status'=>'enable' ,'id'=>$account_id])->first();
      $Data_meta =  Data_meta::where([
        'tag'=>'worker_profile' ,  
        'account_id' => $account_id 
        ])->get();

        foreach($Data_meta as $val){
          $model_worker_profile[$val->meta_key][] = $val->meta_value;
        }
      if(!$model->profile_display_name){
        $model->profile_display_name = $model->display_name;
      }
      if(!$model->profile_email){
        $model->profile_email = $model->line_email;
      }
       return view('manage/regis/regis_index',compact('model','model_worker_profile','account_id','step','step_total'));
    }

    public function  regis_update(Request $request)
    { 
      $step =  $request->input('step');
      $step_total =  $request->input('step_total');
      $post = $request->input();
      $post_worker_profile = $request->input('profile');
      $post_skills = $request->input('skills');
      $post_posts = $request->input('posts');
      $post_img = $request->file('upload');
      $account_id = session('account')['account_id'];
      $account_display_name =  session('account')['profile_display_name'];
      //dd($post ,$request->file(),$request->file('upload'));
      if($post_worker_profile){ 
          $model =  Account::where('id', $account_id)->first();
          //dd($model  );
          $model ::unguard();
          $model->fill($post_worker_profile);     
          $model->updated_at = Carbon::now();
          $model->updated_by = session('account')['account_id'];
          $model->updated_by_username = session('account')['display_name']; 
          if($model->profile_display_url == ''){
            $model->profile_display_url = $model->display_url;
          }
          if($model->save()){  
            helper_account::update_session_profile($model); 
          } 
          if($model->profile_role == 'project_owner'){
            $model->profile_is_regis = 'y';  
            $model->save() ;
            return redirect('/manage');
          }
      }
      if($post_skills){ 
        $model =  Data_meta::where([
          'tag'=>'worker_profile' ,  
          'account_id' => $account_id ])->first(); 
          foreach($post_skills as $mete_key => $meta_value ){
            //dd('dataset $meta_value', $mete_key , $meta_value );
            foreach($meta_value as $val ){
              $dataset =[ 
                "tag" => 'worker_profile',   
                "meta_key" => $mete_key,  
                "meta_value" =>$val,   
                "account_id" => $account_id ,   
              ];
              $data_insert[] = $dataset;
            }
          }
        //  dd($post_worker_profile,$data_insert,$post_skills);
          Data_meta::where([ 
            "tag" => 'worker_profile',   
            "account_id" => $account_id   
          ])->delete();
          foreach (array_chunk($data_insert,1000) as $t)  
          { 
              $model = Data_meta::insert($t); 
          }
      }
      if($post_posts){
        $working_area =  $request->input('working_area');
        $model =  new Posts ;
        // dd($model , $working_area ,$post , $request->file() );
        $model->posts_type = 'worker';
        $model ::unguard();
        $model->fill($post_posts);
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
      if(isset($post_img) ) {
        $source_file = $post_img;
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
           $model = new Upload ;  
           $model ::unguard();
           $model->fill($dataset);  
           $model->upload_key = 'temp_'.date('ymd').uniqid();
           if($model->save()){
              $model->upload_key = date('ymd') . $model->id . substr(time(), 5);
              $model->save();
              
           }
       }
      }

      if($step_total > $step  ){
        $step++;
       return redirect('/manage/regis?step='.$step);
      }else{
        $model =  Account::where('id', $account_id)->first();
        //dd($model  );  
        $model->profile_is_regis = 'y';  
        $model->save() ;
        return redirect('/manage');
      }

       
    }

    public function  manage_index(Request $request)
    {    
      $model =  null; 
      $paginate_num = 50;
      $account_id = session('account')['account_id']; 
      $profile_is_regis = Account::where(['status'=>'enable','profile_is_regis'=>'y' ,'id'=>$account_id])->first();
      if(!$profile_is_regis){
        return redirect('/manage/regis');
      }
      //dd($paginate_num);  
      //$model = Location::orderBy('code','desc')->paginate($paginate_num) ;
       return view('manage/main_menu',compact('model'));
    }
     
    
}
