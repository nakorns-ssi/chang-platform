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
use App\helper\helper_account;

class ProfileController  extends Controller
{ 
    public function __construct()
    {
         //Session::put('url_before_login', back()); 
          $this->middleware('AuthManage');
    } 
    public function  profile_index(Request $request)
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
      //dd($account ,  $model ); 
       return view('manage/profile/profile_index',compact('model'));
    }

    public function  profile_save(Request $request)
    {      
      $model =  [];
      $model_group =  [];  
      $post = $request->input('model');
      $account_id =  session('account')['account_id'];
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
     
      return redirect('/manage/profile') ;
    }
     
    
}
