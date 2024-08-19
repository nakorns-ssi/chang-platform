<?php

namespace App\Http\Controllers\Manage\Project_owner;
  
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

class Project_ownerController  extends Controller
{ 
    protected $page_title = 'สำหรับผู้ว่าจ้าง';
    public function __construct()
    {
         //Session::put('url_before_login', back()); 
        // $this->middleware('AuthBuddyApp');
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
     
    
}
