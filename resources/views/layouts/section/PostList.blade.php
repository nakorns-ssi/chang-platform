<?php 
use Illuminate\Support\Str;
?>
<section id="services" class="services section-bg">
  <div class="container aos-init aos-animate" data-aos="fade-up">

    

    <div class="row gx-1 gx-lg-4 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
      @foreach($model as $key => $value)
      <div class="col-lg-4 col-6 my-1 d-flex align-items-stretch aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
        <div class="card rounded-3 border-0 h-100">
          <div class="badge bg-light shadow opacity-75 text-danger position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
          
          <!-- Product image-->
          <img src="{{$value->image_link}}" class="card-img-top rounded-bottom-0 rounded-3" 
          alt="ซื้อ {{$value->title}}">
          <!-- Product details-->
          <div class="card-body px-2">
              <div class="text-start">
                  <!-- Product name-->
                  <h6 class=" line-clamp-3">{{$value->title}}</h6>  
                  
              </div>
              <div class="text-center"> 
               
                <!-- Product reviews-->
                <div class="d-flex   mb-2">  
                  <div>{{$value->item_rating}} </div>
                  <div class="bi-star-fill text-warning mx-1"></div> 
                </div>
              </div>
              <div class="text-center">
                <!-- Product price-->
               <span class="lead text-danger" >฿{{$value->sale_price}}</span>
                <span class="text-muted text-decoration-line-through ">฿{{$value->price}}</span>
                
             </div>
          </div>
          <!-- Product actions-->
          <div class="card-footer p-2 pt-0 mb-2 border-top-0 bg-transparent">
              <div class="text-start">
                <a href="/review/{{$value->itemid}}/{{Str::slug($value->title)}}" class="  stretched-link"> </a>
              </div>
             
          </div>
      </div>
      </div>
      @endforeach

    
 
    </div>
    
    @include('layouts.section.Pagination')
  </div>
</section>