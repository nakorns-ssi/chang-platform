<?php

namespace App\Http\Controllers\Search;
  
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Cache;
use App\helper\util;
use App\helper\gcp\helper_upload;
use App\Models\chang_prompt\Posts; 
use App\Models\chang_prompt\Data_meta; 
use App\Models\Upload;
use App\Models\Account; 

class SearchController  extends Controller
{ 
    protected $page_title = 'โพสต์';
    protected $posts_type = 'worker';
    public function __construct()
    {
         //Session::put('url_before_login', back()); 
        // $this->middleware('AuthBuddyApp');
    } 
 
    public function  search(Request $request )
    {    
      $page_title = $this->page_title;
      $q = $request->query('q');
      $keyword =   $q;
      $keyword = str_replace("หาช่างทำ", "", $keyword); 
      $keyword = str_replace("งาน", "", $keyword);
      $keyword = str_replace("หาช่าง", "", $keyword);
      $keyword = str_replace("ช่าง", "", $keyword);
      DB::enableQueryLog();
      
      $Account_list = [];
      $paginate_num = 10; 
        $model = new Posts; 
        $model =  $model->select('posts.*', 
        DB::raw('(select url from upload where status = "y" and upload.posts_id = posts.id  limit 1)  as img_thumbnail_url') ,
        DB::raw('(select upload_key from upload where status = "y" and upload.posts_id = posts.id limit 1)  as img_upload_key')  
        ) ;
        $Data_meta = Data_meta::where( 'status','y')->select('account_id')
        ->where('meta_value', 'like', '%' . $keyword . '%')->groupBy('account_id')->get();
        $account_id_list = [];
        foreach($Data_meta as $val){
          $account_id_list[] = $val->account_id;
        }
       

        if(count($account_id_list)>0){
          $Account_list = Account::where( 'status','enable') 
          ->WhereIn('id',$account_id_list)->orderBy('last_active','desc')->take(10)->get();
        }
        $multi_keyword = explode(' ',$keyword);
        if(count($multi_keyword)>1){
          
        }
       // dd($keyword,$multi_keyword,$q);
        foreach($multi_keyword as $val){
          $model = $model->where(function ($query) use ($keyword,$account_id_list,$val) {
          $query->Where('posts.posts_content', 'like', '%' . $val . '%') 
          ->orWhere('posts.location_province', 'like', '%' . $val . '%')  
          ->orWhere('posts.location_amphoe', 'like', '%' . $val . '%')  
          ->orWhere('posts.location_district', 'like', '%' . $val . '%')   
          ->orWhereIn('posts.account_id',$account_id_list)   ; 
          });
        }
        // $model = $model->where(function ($query) use ($keyword,$account_id_list) {
        //   $query->Where('posts.posts_content', 'like', '%' . $keyword . '%') 
        //   ->orWhere('posts.location_province', 'like', '%' . $keyword . '%')  
        //   ->orWhere('posts.location_amphoe', 'like', '%' . $keyword . '%')  
        //   ->orWhere('posts.location_district', 'like', '%' . $keyword . '%')   
        //   ->orWhereIn('posts.account_id',$account_id_list)   ; 
        //   });
        $model =  $model->where([
          'posts.status'=>'y' , 
          'status_code'=>'published' ])
          ->orderby('posts.updated_at','desc')->paginate($paginate_num) ; 
         // dd(DB::getQueryLog());
          $keyword = explode(' ',$q);;
       
       return view('search/search',compact('model' ,'Account_list', 'page_title' ,'keyword' ));
    }
 
     
    
}
