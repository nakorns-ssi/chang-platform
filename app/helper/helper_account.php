<?php
 
namespace App\helper;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Account;


class helper_account
{
    
    public function __construct()
    {
        
    }

    public static function update_session_profile($model = null)
    {
        session()->put('account', [
            'account_id' => $model->id  ,
            'account_code' => $model->account_code  , 
            'display_name' => $model->display_name  , 
            'email' => $model->email , 
            'display_url' => $model->display_url  , 
            'profile_display_name' => $model->profile_display_name  ,  
            'profile_full_name' => $model->profile_full_name  ,  
            'profile_phone' => $model->profile_phone  ,  
            'profile_email' => $model->profile_email  ,  
        ]); 
        return  session('account');
    }
 
 
}
