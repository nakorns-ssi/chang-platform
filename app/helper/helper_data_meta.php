<?php
 
namespace App\helper;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Account;
use App\Models\chang_prompt\Data_meta;


class helper_data_meta
{
    
    public function __construct()
    {
        
    }

    public static function load($tag = null,$ref_id = null ,$meta_key = null ,$meta_value = null)
    {
        
        $model =  Data_meta::where([
            'tag' =>$tag ,
            'ref_id' =>$ref_id ,
            'meta_key' =>$meta_key ,
        ])->get();
        
        //dd($model  ); 
        return  $model ;
    }

    public static function save($tag = null,$ref_id = null ,$meta_key = null ,$meta_value = null)
    {
        if(!isset($meta_value[$meta_key])){
            return false;
        }
        $model =  Data_meta::where([
            'tag' =>$tag ,
            'ref_id' =>$ref_id ,
            'meta_key' =>$meta_key ,
        ])->first();
        if($model){
            $model->tag = $tag;
            $model->ref_id = $ref_id;
            $model->meta_key = $meta_key;
            $model->meta_value = $meta_value[$meta_key]; 
            $model->save(); 
        }else{
            $model = new Data_meta; 
            $model->tag = $tag;
            $model->ref_id = $ref_id;
            $model->meta_key = $meta_key;
            $model->meta_value = $meta_value[$meta_key]; 
            $model->save(); 
             
        }
        //dd($model  ); 
        return  $model ;
    }
 
 
}
