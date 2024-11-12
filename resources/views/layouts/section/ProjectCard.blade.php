<?php 
use App\helper\util; 
use App\helper\helper_lang; 
if(!isset($mode)){
  $mode = null;
}
?>
   
<div class="card position-relative  ">
  @if(isset($value->img_thumbnail_url))
  <img src="{{$value->img_thumbnail_url}}" class="card-img-top " 
   alt="{{$value->title}}" loading="lazy">
  @else 
  
  <div class="content" style=" ">
      <h3>{{$value->title}}"</h3>
  </div> 
</div>

<style>
 
</style>