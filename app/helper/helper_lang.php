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

    public static function post_status($status_code)
    {
        $lang = [
            'published' =>'เผยแพร่' ,
            'draft' =>'ส่วนตัว' ,  
            'worker' =>'ช่าง' ,  
            'product_owner' =>'ผู้ว่าจ้าง' ,  
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
