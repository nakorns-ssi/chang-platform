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
 

}
