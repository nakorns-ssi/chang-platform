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
use App\Models\chang_prompt\Data_meta; 

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
      $step_total = 2;
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
      $account_id = session('account')['account_id']; 
     
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
