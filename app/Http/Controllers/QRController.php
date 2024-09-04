<?php

namespace App\Http\Controllers;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session;
use App\Models\QR_config; 

class QRController extends Controller
{
 public function __construct()
 { 
 }
 
 public function  qr_scan(Request $request , $id)
    {     
      $model =  QR_config::where('id',$id)->first();
      if(!$model){ abort(404); }
      $goto_url = $model->goto_url;
      return redirect()->to($goto_url);
    }
 

}
