<?php 
use App\helper\util; 
use App\helper\helper_lang; 
$display_name = $account->display_name ;
$profile_display_url = $account->profile_display_url ;
$account_code = $account->account_code ;
?>
<div class="row g-0  row-cols-3">
    <div class="col-auto ">
        <div class="c-avatar">
            <img src="{{ $profile_display_url }}" class="   "
              alt="โปรไฟล์" loading="lazy" /> 
        </div>
        
    </div>
    <div class="col-auto px-2 ">โดย
      <a href="{{url('profile/'.$account_code."/".util::slugify($display_name))}}" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
          {{ $display_name }}  
        </a>  
        <br />
      <span class="text-dark  ">โพสต์เมื่อ 22 April  </span>   
    </div>
    <div class="col-auto row align-items-center px-0"> 
        <span  ><i class="bi bi-chevron-right"></i></span> 
    </div> 
 
</div>

<style>

</style>