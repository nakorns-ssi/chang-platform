<?php

namespace App\Http\Controllers\Manage;
  
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session;
use App\Models\Account; 
use App\Models\Upload; 
use App\helper\helper_account;
use App\helper\gcp\helper_upload; 

class ProfileController  extends Controller
{ 
    public function __construct()
    {
         //Session::put('url_before_login', back()); 
          $this->middleware('AuthManage');
    } 
    public function  user_profile(Request $request)
    {    
      $model =  null; 
      $paginate_num = 50; 
      $account = session('account');
      $account_id = session('account')['account_id'];
      $model =  new Account;
      $model = Account::where(['status'=>'enable' ,'id'=>$account_id])->first();
      if(!$model->profile_display_name){
        $model->profile_display_name = $model->display_name;
      }
      if(!$model->profile_email){
        $model->profile_email = $model->line_email;
      }
       
      //dd($model['profile_work_history'],  $model ); 
       return view('manage/profile/user_profile',compact('model'));
    }

    public function  user_profile_save(Request $request)
    {      
      $model =  [];
      $model_group =  [];  
      $post = $request->input('model');
      $account_id =  session('account')['account_id'];
      $account_display_name =  session('account')['profile_display_name']; 
       //dd($post ,$account_id  );
      if($account_id){   
        $model =  Account::where('id', $account_id)->first();
        //dd($model  );
        $model ::unguard();
        $model->fill($post);     
        $model->updated_at = Carbon::now();
        $model->updated_by = session('account')['account_id'];
        $model->updated_by_username = session('account')['display_name']; 
        
        if($model->save()){ 
          helper_account::update_session_profile($model);
          Session::flash('alert', [
            'status' => 'success',
            'text' => 'บันทึกแล้ว!',
          ]);
        }
        
      } 
       
       
      return redirect()->back() ;
    }

    public function  user_profile_upload_img(Request $request)
    { 
      $account_id =  session('account')['account_id'];
      $account_display_name =  session('account')['profile_display_name']; 
      $source_file = [];
      if(isset( $request->file('model')['pic_upload'])){
        $source_file = $request->file('model')['pic_upload'];
      }

    //  dd($source_file,$request->file('model')['pic_upload']);
      $tag = 'profile';
      $fileitem = $request->file('model')['pic_upload'];
      //foreach ($source_file as $key => $fileitem) {
        $ext = pathinfo($fileitem->getClientOriginalName(), PATHINFO_EXTENSION);
        $imageProperties = getimagesize($fileitem);
        $mime = $imageProperties['mime'];
    
        $file_path = $fileitem->getRealPath();
        $key = $account_id;
        $param = [
          'filename' =>  $tag.'_'.$account_id.'_'.uniqid().'_'.time().'_'.$key.'.'.$ext ,
          'bucketName' => 'fdc-upload',
          'upload_path' => 'public',  
        ];
        //dd($file_path ,$fileitem );
        $dataset = helper_upload::upload_select_path($param,$file_path);
       // dd($dataset  );    
       $model = Account::where(['status'=>'enable' ,'id'=>$account_id])->first(); 
       if(isset($dataset["url"])){
         $model->profile_display_url = $dataset["url"];
         $model->save();
         helper_account::update_session_profile($model);
       }
        

    }
     
    
}
