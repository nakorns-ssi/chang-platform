<?php 
use Illuminate\Support\Str;
use App\Models\chang_prompt\Data_meta;
use App\helper\util; 
 
 
$model_tag = Data_meta::select('meta_value' 
, DB::raw('count(meta_value) as total')  )
 ->where('meta_value','!=','-') 
 ->whereIn('meta_key',['work_category','work_sub_category','skill']) 
->groupBy('meta_value' )->orderBy('meta_value')->get(); 
 //      dd(count($model_tag),count($tmp));
?>
  
  <div class="container p-0">


    <div class="text-center pt-2 container">
      <div class="h5" >ประเภทงาน / ทักษะ / สินค้า ที่น่าสนใจ</div> 
    </div> 
    <div class="d-block p-2  mb-3">
      @foreach ($model_tag as $val )
      <?php  $tag_slug = util::slugify($val->meta_value) ?>
      <a href='{{ url("/search?q=".$tag_slug)}}' > 
        <span class="badge   fw-light me-1 my-1" 
        style="background: var(--bs-primary); color: black;" >
        #{{$val->meta_value}} ({{ number_format($val->total) }})
      </span>
      </a> 
      @endforeach
    </div>
  </div>
 

 
<style>

</style>
<script>

</script> 