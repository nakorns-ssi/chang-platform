<?php 
use App\helper\util; 
use App\helper\helper_lang;  

?>
 
<div class="card h-100 w-100 zoom">
  <div class="badge bg-light shadow opacity-75 text-danger position-absolute" 
   style="top: 1rem; right: 1rem"><i class="bi bi-person-circle"></i></div>
   
  <!-- Product image-->
  @if(isset($account->profile_display_url))
  <img src="{{$account->profile_display_url}}" class="card-img-top " alt=" {{$account->profile_display_name}}" loading="lazy">
  @else 
  <div class="text-center pt-2">
    <img class="card-img-top w-50 " src="{{ asset('chang_prompt/img/chang_prompt_logo.svg') }}"
    alt="{{env('APP_NAME')}} {{$account->title}}"    loading="lazy">
  </div>

  @endif
   
  <!-- Product details-->
  <div class="card-body py-1 px-2 d-flex align-items-end">
      
      
      
        <div class="d-flex justify-content-between  row  mb-2">
          <div class="col-sm-6 text-center text-sm-start">
            @if(isset($account->profile_display_name))
            <div class="  h5 text-wrap" >{{$account->profile_display_name}} </div> 
           @else
           <div class=" " >ไม่ระบุ </div> 
            @endif 
          </div>
          <div  class="col-sm-6  text-wrap">
            <span class="badge text-bg-light"><i class="bi bi-alarm"></i> {{ util::thai_datetime($account->last_active)}} </span>
             
          </div>
           
        </div>
        
        
  </div> 
</div> 

<style>

 
</style>