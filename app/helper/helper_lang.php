<?php
 
namespace App\helper;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;   
class helper_lang
{
    
    public function __construct()
    {
        
    }

    public static function ssi_reward_status($status_code)
    {
        $lang = [
            'wait' =>'รออนุมัติ' ,
            'approved' =>'อนุมัติ' ,  
        ];
        if(isset($lang[$status_code])){
            return $lang[$status_code];
        }else{
            return ;
        } 
    }

    public static function ssi_reward_redeem_status($code)
    {
        $lang = [ 
            'wait_redeem' =>'รอแลกสินค้า' ,
            'redeem' =>'จัดการแลกสินค้าแล้ว(ปิดงาน)' ,
        ];
        if(isset($lang[$code])){
            return $lang[$code];
        }else{
            return ;
        } 
    }

     
 
}
