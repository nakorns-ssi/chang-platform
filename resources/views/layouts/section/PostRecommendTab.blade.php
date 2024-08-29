<!-- ======= Post  Recommend Section ======= -->
<?php 
use App\helper\util; 
use App\helper\helper_lang; 
?>
<article  class=" my-4">
  <div class="container aos-init aos-animate" data-aos="fade-up"> 

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">ล่าสุด</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">ยอดผู้ชม</button>
  </li>
  
   
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
    <div class="container aos-init aos-animate" data-aos="fade-up"> 

      <div class="row gx-1 gx-lg-4 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-start">
        @foreach($model as $key => $value)
        <?php $url_slug = url("/post/{$value->posts_key}"."/".util::slugify($value->posts_content) );  ?>
        <div class="col-3 col-md-4  my-1 d-flex align-items-stretch aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
          <a href="{{$url_slug}}">
            @include('layouts.section.PostCard') 
          </a>
        </div>
         
        @endforeach
 
      </div>
  
    </div>
  </div>
  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
    
    <div class="container aos-init aos-animate pt-2" data-aos="fade-up"> 
      <h1>ยอดผู้ชม</h1>
      <div class="row gx-2 gx-lg-4 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-start">
        @foreach($model as $key => $value)

        <div class="col-lg-4 col-6 my-1 d-flex align-items-stretch aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
          @include('layouts.section.PostCard')  
        </div>
         
        @endforeach
 
      </div>
  
    </div>
  </div>
   
</div> 

  </div>
</article>
<!-- End About Video Section -->