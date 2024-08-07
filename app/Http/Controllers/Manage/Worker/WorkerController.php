<?php

namespace App\Http\Controllers\Manage\Worker;
  
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session; 
use App\Models\chang_prompt\Posts; 
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
       return view('manage/worker/worker_index',compact('model','page_title'));
    }
     
    
}
