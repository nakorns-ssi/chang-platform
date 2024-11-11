<?php

namespace App\Http\Controllers\Report;
  
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; 
use Session; 
use mPDF;
use Mpdf\QrCode\QrCode;
use Mpdf\QrCode\Output;

class ReportController  extends Controller
{ 
  
    public function __construct()
    {
      //  Session::put('url_before_login', back()); 
        // $this->middleware('authcheck');
    }

     
    public function  E_profile(Request $request)
    { 
      $get = $request->query(); 
      $model_total = 0;
      $model = []; 
      $production_line = [];
      $account_id = session('account')['account_id'];
      //dd('E_profile' ,  $account_id);
      
      $html = view('report/E_profile', compact('model'))->render();
     // dd($html);
    
       //$pdf = $this->load_pdf(compact('model', 'html'));
       $mpdf = new \Mpdf\Mpdf(); 
       $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
       $fontDirs = $defaultConfig['fontDir']; 
       $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
       $fontData = $defaultFontConfig['fontdata']; 
       $mpdf = new \Mpdf\Mpdf([
           'fontDir' => array_merge($fontDirs, [
             public_path('fonts'),
           ]),
           'fontdata' => $fontData + [
                   'thsarabun' => [
                       'R' => 'THSarabunNew.ttf', 
                   ], 
               ], 
           'default_font' => 'thsarabun' ,
           'mode' => 'utf-8',
           'format' => 'A4', 
           'orientation' => 'P' 
       ]);
  
       $count_page = 0;
      // $html = '';
       $mpdf->AddPageByArray([
           'margin-left' => 5,
           'margin-right' => 5,
           'margin-top' => 25,
           'margin-bottom' => 5,
       ]);  
        $mpdf->restrictColorSpace = 1;
       $mpdf->defaultheaderline = 0;
       $mpdf->defaultfooterline = 0; 
       $mpdf->showImageErrors = true;  
      // dd($model);  
      $html .= "<h1>สวัสดี</h1>";
       $html .= "<br/>";
       $html .= "<h1>ABCวิธีติดตั้ง 13 ฟอนต์มาตรฐานสําหรับระบบงานราชการไทย วิธีติดตั้ง 13 ฟอนต์มาตรฐานสําหรับระบบงานราชการไทย</h1>";
       
       $mpdf->WriteHTML($html);  
      // $mpdf->AddPage();
       ////////////////  
       $Filename = 'E_Profile_' . date('ymd').'_' .date('Hi'). '.pdf';
       return $mpdf->Output($Filename, 'i'); 

    }
 

    public static function load_pdf($html=null)
    {
   //  dd($model);
         
    }

  
     
    
}