<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Account;
use App\helper\helper_account;
use App\helper\util;
use Session;
use Cookie;

class AuthController extends Controller
{
 public function __construct()
 {
       
 }
 
 public function callback(Request $request)
 { 
           $sso = $request->input('sso'); ;
           $callback_param =    $request->input(); ; 
          // dd($sso,$callback_param);
           $result = [];  
           switch ($sso) {  
            case 'line': 
                $result = $this->sso_line( $callback_param);
            break;
            case 'AD': 
                $result = $this->sso_AD( $callback_param);
            break; 
        }
        return $result;
        //return $this->redirect(["/booking"]);
 }

 
 public function sso_line($param)
    {
        $login = [];
       
        $login['line_id'] = $param['id'];
        $login['display_name'] = $param['name'];
        $login['line_email'] = $param['email'];
        $login['email'] = $param['email'];
        $login['display_url'] = $param['picture'];
        $login['page'] = $param['page'];
        $model = Account::where(['line_id' =>  $login['line_id'] ,'status'=>'enable' ])->first();
        //dd($model , $param);
         
         if (!$model) {
             // print_r($login); die();
             $data = $login;
             unset($data['page']);
             $model = new Account();   
             $model ::unguard();
             $model->fill($data);
             $model->account_code = 'temp_'.date('ymd').uniqid();    
             $model->created_at =Carbon::now();
             $model->last_active = Carbon::now(); 
             $model->created_by = $_SERVER['REMOTE_ADDR'];    
              
             if($model->save()){ 
                $model->account_code = util::gen_key($model->id);
                $model->save();
             }  
         }
           
         if($model){  
              //dd($model  );
             $model->display_name = $login['display_name'];
             $model->display_url = $login['display_url'];
             $model->last_active = Carbon::now();  
             $model->save();
             if($model->profile_display_url == ''){
                $model->profile_display_url = $login['display_url'];
             }
             helper_account::update_session_profile($model);
         }
       
         
            if(isset( $login['page'])){
             return redirect($login['page']) ;
            }else{
             return redirect('/manage') ;
            }
            
    }

    public function  debug()
     {  
        dd(session()->all(),session('role')   , Cookie::get());
     } 

     public function  login(Request $request)
     {   
       $page =  $request->query('page');
        if($page){
           session(['page'=>$page]); 
        }
        $role =  $request->query('role');
        if($role){
           session(['role'=>$role]); 
        }
        if(session()->has('account')){
             return redirect()->to($page); 
        }  
        return view('auth/login' );
     }

     public function  logout(Request $request)
     {   
        $previous_url = url()->previous() ;
        if(session()->has('account')) {
            session()->forget('account');  
           
        } 
        if(!$previous_url){
            $previous_url = url('/') ;
        }
        session()->forget('role');  
        return view('auth/logout', compact('previous_url'));
     }

     public function  auto($id)
     {  
        $model = DB::table('account')->where(['id' =>  $id ,'status'=>'enable' ])->first();
        // dd($model);
        if($model){
            helper_account::update_session_profile($model);
            
        }
       
        
        return response()->json(session()->get('account'));
  
     } 

}

