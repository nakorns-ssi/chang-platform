<?php 
use App\helper\util; 
if(!isset($mode)){
  $mode = null;
}
?>
 
<div class="card h-100 w-100 zoom">
  <div class="badge bg-light shadow opacity-75 text-danger position-absolute" style="top: 0.5rem; right: 0.5rem">ช่าง</div>
   
  <!-- Product image-->
  @if(isset($value->img_thumbnail->url))
  <img src="{{$value->img_thumbnail->url}}" class="card-img-top " alt=" {{$value->title}}" loading="lazy">
  @else 
  <div class="text-center pt-2">
    <img class="card-img-top w-50 " src="{{ asset('chang_prompt/img/chang_prompt_logo.svg') }}"
    alt="{{env('APP_NAME')}} {{$value->title}}"    loading="lazy">
  </div>

  @endif
   
  <!-- Product details-->
  <div class="card-body py-4 px-2">
      <div class="text-start">
          <!-- Product name-->
          <h6 class=" line-clamp-2">{{$value->posts_content}}</h6>  
          <span class="badge text-bg-warning">{{$value->global_category1}}</span>
      </div>
      <div class="text-center"> 
        <!-- Product reviews-->
      
        <div class="d-flex justify-content-between  small  mb-2">
          <div class="">
            @if(isset($value->location_province))
            <div class="d-inline" >{{$value->location_province}} </div> 
           @else
           <div class="d-inline" >ไม่ระบุ </div> 
            @endif
            <div class="d-inline bi bi-geo-alt-fill  "></div>
          </div>
          <div class="">
               <!-- Product price-->
              @if($value->price_min!=$value->price_max)
              <span class="text-dark" >฿{{number_format($value->price_min)}}</span> - 
              <span class="text-dark  ">฿{{number_format($value->price_max)}}</span> 
              @else
              <span class="text-dark" >฿{{number_format($value->price_min)}}</span> 
              @endif
          </div>
           
        </div>
        
       
    </div>
  </div>
  @if($mode=='edit')
    <div class="card-footer text-body-secondary"> 
      <span class="float-end  ">
        <a class="btn  btn-sm btn-primary" href="/manage/worker/post/edit?key={{ $value->posts_key }}"
            role="button">แก้ไขข้อมูล</a>
      </span>
    </div>
  @endif
</div> 

<style>

 
</style>