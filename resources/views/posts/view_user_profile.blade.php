<?php 
use App\helper\util; 
use App\helper\helper_lang; 
$profile_display_name = $account->profile_display_name ;
$profile_display_url = $account->profile_display_url ;
$account_code = $account->account_code ;
$url_link_profile = url('profile/'.$account_code."/".util::slugify($profile_display_name));
?>
<div class="row g-0  row-cols-3">
    <div class="col-auto ">
        <a href="{{$url_link_profile}}" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
        <div class="c-avatar">
            <img src="{{ $profile_display_url }}" class="   "
              alt="โปรไฟล์" loading="lazy" /> 
        </div>
        </a>
        
    </div>
    <div class="col-auto px-2 ">โดย
      <a href="{{$url_link_profile}}" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
          {{ $profile_display_name }}  
        </a>  
        <br />
      <span class="text-dark  ">โพสต์เมื่อ {{ util::thai_datetime($posts->updated_at)}}  </span>   
    </div>
    <div class="col-auto row align-items-center px-0"> 
        <span  ><i class="bi bi-chevron-right"></i></span> 
    </div> 
 
</div>

<style>
.c-avatar {
    background-color: #cfd6df;
    border-radius: 100%;
    display: block;
    height: 48px;
    position: relative;
    text-align: center;
    width: 48px;
}
.c-avatar>img {
    border-radius: 100%;
    display: block;
    height: 100%;
    -o-object-fit: cover;
    object-fit: cover;
    width: 100%;
    z-index: 2;
}
</style>