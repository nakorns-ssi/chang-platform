<?php

namespace App\Http\Controllers\User;
  
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session; 
use App\Models\buddyapp\Account;

class UserController  extends Controller
{ 
    public function __construct()
    {
         //Session::put('url_before_login', back()); 
         $this->middleware('AuthAdmin');
    } 
    public function  user_index(Request $request)
    {    
      $model =  [];
      $filter = $request->query('filter');  
      $paginate_num = 50;  
       $model = Account::orderBy('id','desc')->paginate($paginate_num) ;
       return view('backend/user/user_index',compact('model'));
    }

    
     
    
}
