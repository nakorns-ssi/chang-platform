<!-- ======= Post  Recommend Section ======= -->
<?php 
use App\helper\util; 
use App\helper\helper_lang;
use App\Models\chang_prompt\Posts;
use Illuminate\Support\Facades\DB; 

$paginate_num = 10; 
$model_worker = new Posts; 
$model_worker =  $model_worker->select('posts.*', 
DB::raw('(select url from upload where status = "y" and upload.posts_id = posts.id  limit 1)  as img_thumbnail_url') ,
DB::raw('(select upload_key from upload where status = "y" and upload.posts_id = posts.id limit 1)  as img_upload_key')  
) ; 
$model_worker = $model_worker->whereIn('posts.posts_type', ['worker']);
$model_worker =  $model_worker->where([
  'posts.status'=>'y' ,   
  'status_code'=>'published' ])
  ->orderBy('updated_at','desc')->limit(10)->get() ;
  //////////////
$model_project_owner = new Posts; 
$model_project_owner =  $model_project_owner->select('posts.*', 
DB::raw('(select url from upload where status = "y" and upload.posts_id = posts.id  limit 1)  as img_thumbnail_url') ,
DB::raw('(select upload_key from upload where status = "y" and upload.posts_id = posts.id limit 1)  as img_upload_key')  
) ; 
$model_project_owner = $model_project_owner->whereIn('posts.posts_type', ['project_owner']);
$model_project_owner =  $model_project_owner->where([
  'posts.status'=>'y' ,   
  'status_code'=>'published' ])
  ->orderBy('updated_at','desc')->limit(10)->get() ;

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
        @foreach($model_worker as $key => $value)
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
        @foreach($model_project_owner as $key => $value)
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