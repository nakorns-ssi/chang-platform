<?php
 
namespace App\helper\gcp;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Google\Cloud\Storage\StorageClient;
use Carbon\Carbon;
use Session;
use Image; 
use App\Models\Upload;
class helper_upload
{
    
    public static function get_img( $ref_id = null )
    { 
        if($ref_id==null) return $ref_id;

        $model = Upload::where('status','y') 
        ->where('ref_id',$ref_id)->orderby('updated_at','desc')->first(); 
        // dd( $model );
        return $model;
    }

    public static function upload_select_path($param = null  ,$source_file = null )
    {  
        $upload_path = $param['upload_path'];
        $filename = $param['filename'];
        $upload_path .= '/'.date('y').'/'.date('m');
        $bucketName = $param['bucketName']; 
        $googleConfigFile = file_get_contents(storage_path('googleCloudStorage.key')); 
        $storage = new StorageClient([ 
            'keyFile' => json_decode($googleConfigFile, true)
        ]); 
       
        $filename = $filename;
        $googleCloudStoragePath = $upload_path.'/'.$filename;  
        // $storage->registerStreamWrapper();  
        // return file_get_contents("gs://public_buddy/SSI_Rewards.JPG");
        $bucket = $storage->bucket($bucketName);
       
         
        $object = $bucket->upload( file_get_contents($source_file) ,[
             'predefinedAcl' => 'publicRead',
            'name' => $googleCloudStoragePath
          ]);  
         // dd($object,$bucket->acl(),$bucket,$bucketName);
        //  unlink($source_file); 
         // dd();
         $dataset =[     
            "file_name"=> $filename ,
            "folder_name"=>$bucketName.'/'.$upload_path  ,
            "url"=> 'https://storage.googleapis.com/'.$bucketName.'/'. $googleCloudStoragePath,   
         ];
        return  $dataset ; 
    }

 

 

  


   

 
 
}
