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
use App\Models\Upload;
use Google\Cloud\Storage\StorageClient;

class UploadController extends Controller
{
 public function __construct()
 { 
 }
 
 public function img_path(Request $request,$upload_key=null)
 {
   
   $model =Upload::where('status','y')
   ->where('upload_key',$upload_key )  
   ->first(); 
   if(!$model){
      return response('Page not found', 404);
   } 
   $googleConfigFile = file_get_contents(storage_path('googleCloudStorage.key')); 
        $storage = new StorageClient([ 
            'keyFile' => json_decode($googleConfigFile, true)
        ]); 
       $path_img =  $model->folder_name.'/'. $model->file_name;
      //   $filename = $filename;
      //   $googleCloudStoragePath = $upload_path.'/'.$filename;  
        $storage->registerStreamWrapper();   
        return  response(file_get_contents("gs://".$path_img))->header('Content-type',$model->content_type) ;

    return view('upload.upload_view_img', compact('model', 'upload_key'));
   
 }

 public function del(Request $request)
 {
    $upload_key =   $request->query('upload_key');  
    $account_id =  session('account')['account_id'];
    $account_display_name =  session('account')['profile_display_name'];
    
    $dataset = [ 
        "status" => 'd', 
        'updated_by'=>   $account_id ,
        'updated_by_username'=> $account_display_name, 
    ];   
     $model = DB::table('upload') ->where("upload_key",$upload_key)->update($dataset);

      if($model){
         Session::flash('alert', [
            'status' => 'success',
            'text' => 'บันทึกข้อมูลแล้ว!' . '  , ' . date('H:i:s'),
        ]);
         return back()->withInput();
        }else{
         Session::flash('alert', [
            'status' => 'error',
            'text' => 'ข้อมูลไม่ถูกต้อง',
        ]);
         return back()->withInput();
         } 
 }
 

}
