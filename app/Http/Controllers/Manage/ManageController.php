<?php

namespace App\Http\Controllers\Manage;
  
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session; 

class ManageController  extends Controller
{ 
    public function __construct()
    {
         //Session::put('url_before_login', back()); 
          $this->middleware('AuthManage');
    } 
    public function  manage_index(Request $request)
    {    
      $model =  null; 
      $paginate_num = 50;
      //dd($paginate_num);  
      //$model = Location::orderBy('code','desc')->paginate($paginate_num) ;
       return view('manage/main_menu',compact('model'));
    }
     
    
}
