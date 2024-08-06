<?php

namespace App\Http\Controllers;
use App\Classes\API\ThaiPost;
use App\Customer;
use App\DiscountUsed;
use App\CustomerBookingNote;
use App\Http\Controllers\Controller;
use App\ThaiPostEMSNumber;
use App\Manifest;
use App\ManifestHistory; 
use App\ManifestDetail;
use App\ManifestDetail_box;
use App\WebContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\helper\linelogin; 
use Illuminate\Support\Str;
use Mail; 
use mPDF;
use Mpdf\QrCode\QrCode;
use Mpdf\QrCode\Output;
use Carbon\Carbon; 
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;

class TestController extends Controller
{ 


  public function lab(Request $request)
  {
     // phpinfo();
    try {
     $re = DB::connection()->getPdo();
     dd($re);
  } catch (\Exception $e) {
      die("Could not connect to the database.  Please check your configuration. error:" . $e );
  }
    
    // $data = array(
    //   'email' => 'joddbass@gmail.com', 
    //   'html' => 'tester .365844', 
    // );
    // //dd($data['email'][0]);
    
    //   Mail::send('mails._layout_email', $data, function ($message) use ($data) {
    //       $message->to($data['email'])
    //           ->from('noreply@bscm.co.th', 'bscm noreply') 
    //           ->subject('แจ้งค่าบริการจัดส่งเลขที่ '    );
    //   });
  
    // dd($res);
      
  }

  public function check_path(Request $request)
 {
    $routeCollection =  Route::getRoutes();
      dd($routeCollection);
    foreach ($routeCollection as $value) {
       // echo $value->getPath();
    }
 }
    public function import_contact(Request $request)
 {
     
  $keyword = [];
  $country_list = [];
//   $model = DB::table('app_country') 
//   ->select('country as country_name','code as country_cd')
//   ->wherenotnull('code')
//   ->orderby('country')->distinct()->get() ;
   
   // dd($country_list);
  $sheet =  Excel::toArray(new UsersImport, storage_path('app/Contacts_full.xlsx'));
  dd( count($sheet));
  $country_tag = "";
  $row_sort = [];
  foreach( $sheet as $key_sheet => $row){
     dd($key_sheet,$row);
     
     foreach($row as $key_row => $row_data){
      if($key_row <= 3) continue; 
      
      //$keyword[$key_sheet][$key_row][] =strtolower($row_data) ;
      //dd($row_data);
      foreach($row_data as $key_col => $item_data){
        if (strpos($item_data, 'Note:') !== false)  continue;
        if($item_data == null) continue;
        $item_data= str_replace(array("\n", "\r"), '', $item_data) ;
        $item_data= str_replace(array("*"), '', $item_data) ;
        $item_data = strtolower($item_data);
      //  dd($row_data,$key_sheet,$item_data); 
       $row_sort[$key_sheet][$key_col][] = $item_data;
        
      }  
     }//end row
      
     //if($key_sheet>=2) break;
   }//end sheet
   $col_sort = [];
  foreach($row_sort as $k => $row_sort_v){
    foreach($row_sort_v as $row_sort_k => $row_sort_v){
      foreach($row_sort_v as $row_sort_kk => $row_sort_vv){
      // dd($row_sort_vv);
      $col_sort[] = $row_sort_vv;
      }
    }
    
  }// foreach($row_sort 

  $data_clean = [];
  $country_list_tmp = $country_list;
foreach($col_sort as $key => $val){
  if($val=='- (aotearoa)'){ continue; }
  if($val=='new zealand'){
    $val='new zealand - (aotearoa)';
  }
  if($val=='- grenadines'){ continue; }
  if($val=='saint vincent & the'){
    $val='saint vincent & the - grenadines';
  }
  if($val=='- islands'){ continue; }
  if($val=='turks and caicos'){
    $val='turks and caicos - islands';
   
  }

  if($val=='bonaire, sint'){ continue; }
  if($val=='- eustatius and saba'){
    $val='bonaire, sint- eustatius and saba';
    //dd($val , $key ,in_array($val, $country_list), $country_list );
  }

  if($val=='bosnia and'){ continue; }
  if($val=='- herzegovina'){
    $val='bosnia and- herzegovina';
    //  dd($val,$key , $country_tag,in_array($val, $country_list));
  }

  

  if($val=='- islands'){ continue; }
  if($val=='british virgin'){
    $val='british virgin-islands';
    //dd($val , $key , $country_tag,in_array($val, $country_list),$country_list);
  }
  
  if($val=='trinidad and tobagobarrackpore'){
    $val='trinidad and tobago';
    $data_clean[$country_tag][] =  [
      "country_code" => array_search( $val ,$country_list) ,
      "country_name" => $val ,
      "data" => 'barrackpore' , 
    ];
  } 

  if( $country_tag =='chile' && $val=='el salvador'){
    $data_clean[$country_tag][] =  [
      "country_code" => array_search( $country_tag ,$country_list) ,
      "country_name" => $country_tag ,
      "data" => $val , 
    ];
    continue;
  } 

  if (in_array($val, $country_list_tmp)){ 
    // if (($key = array_search($val, $country_list_tmp)) !== false) {
    //   unset($country_list_tmp[$key]);
    // }
    $country_tag = $val; 
    // dd($val,$key , $country_list_tmp,in_array($val, $country_list_tmp));
    continue;
  }
  $data_clean[$country_tag][] =  [
    "country_code" => array_search( $country_tag ,$country_list) ,
    "country_name" => $country_tag ,
    "data" => $val , 
  ];
 // $data_clean[$country_tag][] = $val;
}
   //dd($row_sort);
   // dd(  $col_sort ,  $data_clean );
   //$keyword_list = array_unique($keyword);
  //  $withoutDuplicates = array_unique(array_map("strtoupper", $keyword));
  //  $duplicates = array_diff($keyword, $withoutDuplicates); 
  // dd( count($sheet),count($keyword),count(array_unique($keyword)) );
   $data_insert = [];
   foreach($data_clean as $c_val){
     //dd($c_val);
     foreach($c_val as $val){
      if(!isset($val['data'])) $val['data'] = null;
      if(!isset($val['country_name'])) $val['country_name'] = null;
      if(!isset($val['country_code'])) $val['country_code'] = null;
      $zip_low = null;
      $zip_high = null;
      $zip_digit = null;
      if(is_numeric($val['data'])){
        $zip_digit = strlen($val['data']);
      } 
      $data = $val['data'];
      $country_name = $val['country_name'];
      $country_code = $val['country_code'];
      if (strpos($data, "-") !== false) {
        //$key_list[] =$val;
        $zip_low = explode("-",$data)[0];
        $zip_high = explode("-",$data)[1];
        if(is_numeric($zip_high)){
          $zip_digit = strlen($zip_high) ;
          $zip_low = explode("-",$data)[0];
          $zip_high = explode("-",$data)[1];
        }  else{ 
          $zip_low = null;
          $zip_high = null;
          $zip_digit = null;
        }
      }
      if(is_numeric($data)){
        $zip_digit = strlen($data) ;
        $zip_low = $data;
        $zip_high = $data;
      }   
      // if($data=='ahipara'){
      //   //dd($data,$country_code,$data_clean, $country_list);
      // }
      $dataset_trace =[ 
        "area_key" =>$data,  
        "courier_name" => 'FEDEX',
        "zip_low" =>$zip_low,  
        "zip_high" =>$zip_high,  
        "zip_digit" =>$zip_digit,  
        "country_code" =>$country_code,  
        "country_name" =>$country_name,   
        "create_at"=> Carbon::now() , 
        "create_by"=> Auth::user()->id, 
        "modify_at"=> Carbon::now() , 
        "modify_by"=> Auth::user()->id,  
        "modify_by_username"=>Auth::user()->name,  
     ];
     $data_insert[] = $dataset_trace;
    // dd($data_insert);
     }
    
   }
   
   
   foreach (array_chunk($data_insert,1000) as $t)  
{ 
     $model = DB::table('remote_area')->insert($t); 
}
   //dd(DB::getQueryLog());  
   dd(count($data_insert),$model );
    //  return $model->toJson();
 }
    

   
     

    public function debug(Request $request)
    {  
         
       //dd($request->session()->all());
       dd(session()->all());
    }

     
   
 
}
