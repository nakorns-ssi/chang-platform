<!-- ======= Post  Recommend Section ======= -->
<?php 
use App\helper\util; 
use App\helper\helper_lang; 
?>
<article  class=" my-4">
  <div class="py-3 px-3">
    <h5>คุณอาจสนใจสิ่งนี้</h5>
  </div>

  <div class="container aos-init aos-animate" data-aos="fade-up"> 

<ul class="nav nav-tabs" id="myTab" role="tablist"> 
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="worker-tab" data-bs-toggle="tab" data-bs-target="#worker-tab-pane" type="button" role="tab" aria-controls="worker-tab-pane" aria-selected="true">หางาน</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="project_owner-tab" data-bs-toggle="tab" data-bs-target="#project_owner-tab-pane" type="button" role="tab" aria-controls="project_owner-tab-pane" aria-selected="false">หาช่าง</button>
  </li>
  
   
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="worker-tab-pane" role="tabpanel" aria-labelledby="worker-tab" tabindex="0">
    <div class="container aos-init aos-animate" data-aos="fade-up"> 
 
      <div class="row gx-2 gx-lg-4 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-start">
        @foreach($model as $key => $value)
        <?php if($value->posts_type != 'worker') continue; ?>
        <?php $url_slug = url("/post/{$value->posts_key}"."/".util::slugify($value->posts_content) );  ?>
        <div class="col-lg-4 col-6 my-1 d-flex align-items-stretch aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
          <a href="{{$url_slug}}">
          @include('layouts.section.PostCard') 
        </a>
        </div>
         
        @endforeach
 
      </div>
  
    </div>
  </div>
  <div class="tab-pane fade" id="project_owner-tab-pane" role="tabpanel" aria-labelledby="project_owner-tab" tabindex="0">
    
    <div class="container aos-init aos-animate pt-2" data-aos="fade-up">  
      <div class="row gx-2 gx-lg-4 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-start">
        @foreach($model as $key => $value)
        <?php if($value->posts_type != 'project_owner') continue; ?>
        <?php $url_slug = url("/post/{$value->posts_key}"."/".util::slugify($value->posts_content) );  ?>
        <div class="col-lg-4 col-6 my-1 d-flex align-items-stretch aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
          <a href="{{$url_slug}}">
          @include('layouts.section.PostCard')  
          </a>
        </div> 
        @endforeach
 
      </div>
  
    </div>
  </div>
   
</div> 

  </div>
</article>
<!-- End About Video Section -->