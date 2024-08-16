<div class="card h-100">
  <div class="badge bg-light shadow opacity-75 text-danger position-absolute" style="top: 0.5rem; right: 0.5rem">ช่าง</div>
   
  <!-- Product image-->
   
  <!-- Product details-->
  <div class="card-body py-4 px-2">
      <div class="text-start">
          <!-- Product name-->
          <h6 class=" line-clamp-2">{{$value->posts_content}}</h6>  
          <span class="badge text-bg-warning">{{$value->global_category1}}</span>
      </div>
      <div class="text-center"> 
        <!-- Product reviews-->
        <div class="d-flex justify-content-center small  mb-2">
            <div>ชุมพร </div> 
            <div class="bi bi-geo-alt-fill"></div>
        </div>
        <!-- Product price-->
       <span class="text-danger" >฿{{$value->price_min}}</span>
        <span class="text-muted text-decoration-line-through ">฿{{$value->price_max}}</span>
        
    </div>
  </div>

</div>