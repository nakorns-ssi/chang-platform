<?php

namespace App\Http\Controllers\API;
 
use App\Http\Controllers\Controller;  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session; 
use App\Models\Location;
use App\helper\util;
use \Cache;

class LocationController extends Controller
{
    public function __construct()
    {
      //  Session::put('url_before_login', back()); 
        // $this->middleware('authcheck');
    }

    public function location_json(Request $request)
    { 
       // $post =   $request->input();    
        $get =   $request->query();    
        $model = [];  
        $paginate_num = 25;
        DB::enableQueryLog();
       
        $q = $get['q'];
        
        if($q){ 
            try 
            {
              $model = new Location  ; 
             $model = $model->Where('CHANGWAT_T', 'like', '%' . $q . '%') 
              ->orWhere('AMPHOE_T', 'like', '%' . $q . '%') 
               ->orWhere('TAMBON_T', 'like', '%' . $q . '%')
               ->orderBy('location_id','desc')->paginate($paginate_num); 
            }
            catch (ModelNotFoundException $e)
            {
                    dd($e);
            }
           }  
       
       // dd($model);  
        // $location_list = [];
        // foreach( $model as $val):
        //   //  $distance_km = util::distance($client_lat,$client_long ,$val->latitude ,$val->longitude );
        //     $location_list[] = [
        //         'location_id'=>  $val->location_id , 
        //        // 'distance'=>  number_format((float) $distance_km, 2, '.', '') , 
        //         'latitude'=> $val->latitude ,
        //         'longitude'=> $val->longitude ,
        //         'area_th'=> $val->TAMBON_T , 
        //        // 'area_eng'=> $val->TAMBON_E ,
        //         'province_th'=> $val->AMPHOE_T  ,
        //       //  'province_eng'=> $val->AMPHOE_E  ,
        //         'city_th'=> $val->CHANGWAT_T , 
        //       //  'city_eng'=> $val->CHANGWAT_E ,
        //     ]; 
        // endforeach;
        // sort($location_list);
        // //dd(DB::getQueryLog(),$model,$location_list);
        //  $model = $location_list ; 

         $data = [];
       foreach($model as $key => $val){ 
          $text = ""; 
          $data_text = "";    
          $data[] = [
            'id'=>$val->location_id , 
            'text'=>trim($val->TAMBON_T).' , '.$val->AMPHOE_T.' , '.$val->CHANGWAT_T
          ];
                    
       }///end foreach
       $model = $data ; 

        
        if($model){  
            $response = ['status' => 200, 'type' => 'success', 'msg' => 'ok', 'results' => $model, 'update_at' => date('Y-m-d H:i:s')];
        }else{
            $response = ['status' => 500, 'type' => 'error', 'msg' => 'error', 'results' => $model, 'update_at' => date('Y-m-d H:i:s')];
        }
         return response()->json($response);
    }
 

    public function get(Request $request)
    { 
       // $post =   $request->input();    
        $get =   $request->query();    
        $model = null;  
        DB::enableQueryLog();
         
        if($get){ 
           $client_lat =  $get['lat'];
           $client_long = $get['long'];
           //dd($get , );
            $model = Location::where('latitude', 'like',  number_format($get['lat'], 1, '.', '').'%' )  
            ->where('longitude', 'like', number_format($get['long'], 1, '.', '').'%' )   
            ->orderBy('CH_ID','desc')->get();  
        } 
        $location_list = [];
        foreach( $model as $val):
            $distance_km = util::distance($client_lat,$client_long ,$val->latitude ,$val->longitude );
            $location_list[] = [
                'location_id'=>  $val->location_id , 
                'distance'=>  number_format((float) $distance_km, 2, '.', '') , 
                'latitude'=> $val->latitude ,
                'longitude'=> $val->longitude ,
                'area_th'=> $val->TAMBON_T ,
                'province_th'=> $val->AMPHOE_T  ,
                'city_th'=> $val->CHANGWAT_T ,
                'area_eng'=> $val->TAMBON_E ,
                'province_eng'=> $val->AMPHOE_E  ,
                'city_eng'=> $val->CHANGWAT_E ,
            ]; 
        endforeach;
        sort($location_list);
        //dd(DB::getQueryLog(),$model,$location_list);
         $model = $location_list ;
        if($model){  
            $response = ['status' => 200, 'type' => 'success', 'msg' => 'ok', 'results' => $model, 'update_at' => date('Y-m-d H:i:s')];
        }else{
            $response = ['status' => 500, 'type' => 'error', 'msg' => 'error', 'results' => $model, 'update_at' => date('Y-m-d H:i:s')];
        }
         return response()->json($response);
    }

    
 
  
}
