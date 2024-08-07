<?php

namespace App\Http\Controllers\Manage\worker;
  
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session; 
use App\Models\buddyapp\SaleOrder;
use App\Models\buddyapp\ShipmentOrder;
use App\Models\buddyapp\Customer;
use App\helper\ssi_reward\helper_shop;

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
       return view('buddyapp/myorder_index',compact('last_update','customer_code','filter','tab','master_filter','model','model_group','total_weight','total_weight_out_standing','page_title'));
    }
     
    
}
