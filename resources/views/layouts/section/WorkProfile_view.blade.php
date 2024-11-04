<?php 
use App\helper\util; 
use App\helper\helper_lang;
use App\Models\chang_prompt\Posts; 
use App\Models\chang_prompt\Data_meta;  
if(!isset($mode)){
  $mode = null;
}
$model =  null; 
$Data_meta =  Data_meta::where([
        'tag'=>'worker_profile' ,  
        'account_id' => $account_id 
        ])->get();

        foreach($Data_meta as $val){
          $model[$val->meta_key][] = $val->meta_value;
        }
      $worker_profile =  $model;
      $posts_type = 'worker_history';
      $work_history = new Posts;
        $work_history =  $work_history->select('posts.*', 
        DB::raw('(select url from upload where status = "y" and upload.posts_id = posts.id  limit 1)  as img_thumbnail_url') ,
        DB::raw('(select upload_key from upload where status = "y" and upload.posts_id = posts.id limit 1)  as img_upload_key')  
        ) ;
        $work_history =  $work_history->where([
          'posts.status'=>'y' ,
          'posts.posts_type' =>  $posts_type   ])
          ->orderby('posts.updated_at','desc')->limit(4)->get() ;
?>
 
<section class="  ">
  <div class="container "> 
    
      <div class="row mt-2 g-2">
          <div class="col-sm-12"> 
              <div class=" card px-4 p-2 bg-white border rounded-4">
                  <div class="row justifu-content-start align-items-center">
                      <div class="col-10  "> 
                          <a href="/manage/worker/worker_history">
                          <div class="h4 text-nowrap pl-3">
                              <i class="bi bi-pencil-square h5"></i> ประวัติการทำงาน 
                          </div>  
                          </a>
                          <div class="row justifu-content-center">
                              @foreach ($work_history as $key => $value)
                              <?php 
                                  $dataJson = json_encode([  
                                      '_key' => $value->posts_key ,  
                                      ]);
                              ?>
                                  <div class=" col-sm-8 col-md-8  my-1 ">
                                      <div class="row py-2 px-3  border rounded-4 d-flex aligh-items-center justify-content-between bg-white">
                                          <div class="col-12 py-2 justify-content-between"> 
                                                  <span class="h6 my-2"> 
                                                      {{util::thai_date_short($value->start_date)}} - {{util::thai_date_short($value->end_date)}}  
                                                  </span>  
                                          </div> 
                                          <div class="col-12  ps-3">  
                                              <div class="p-2 bg-light rounded-2 ">{!! nl2br($value->posts_content) !!}</div> 
                                          </div> 
                                      </div> 
                                  </div>
                              @endforeach
                              
                          </div>
                      </div> 
                  </div> 
              </div> 
          </div>

          <div class="col-sm-12"> 
              <div class=" card px-4 p-2 bg-white border rounded-4">
                  <div class="row justifu-content-start align-items-center">
                      <div class=" col-sm-12 ">
                          <a href="/manage/worker/worker_project">
                          <div class="h4 text-nowrap pl-3">
                              <i class="bi bi-pencil-square h5"></i> ผลงาน 
                          </div> 
                      </a>
                      </div> 
                  </div> 
              </div> 
          </div>

          <div class="col-sm-12"> 
              <div class=" card px-4 p-2 bg-white border rounded-4">
                  <div class="row justifu-content-start align-items-center">
                      <div class=" col-sm-12 ">
                          <a href="/manage/worker/worker_skill">
                          <div class="h4 text-nowrap pl-3">
                              <i class="bi bi-pencil-square h5"></i> ความสามารถ 
                          </div> 
                          </a>
                      </div>
                      <div class=" col-sm-6 ">
                          <div class="h6 text-nowrap pl-3">
                                  ประเภทงาน 
                          </div>  
                              <div class="col-sm-12 my-2">   
                                  <div class="d-block p-2   ">
                                      @foreach ($worker_profile['work_category'] as $key => $item )  
                                      <span class="badge text-bg-warning fw-light me-1 ">#{{$item}}</span> 
                                      @endforeach
                                  </div> 
                              </div>
                              
                      </div> 
                      <div class=" col-sm-6 ">
                          <div class="h6 text-nowrap pl-3">
                                  ประเภทงานย่อย 
                          </div>  
                              <div class="col-sm-12 my-2">   
                                  <div class="d-block p-2   ">
                                      @foreach ($worker_profile['work_sub_category'] as $key => $item )  
                                      <span class="badge text-bg-warning fw-light me-1 ">#{{$item}}</span> 
                                      @endforeach
                                  </div> 
                              </div>
                              
                      </div> 
                      <div class=" col-sm-6 ">
                          <div class="h6 text-nowrap pl-3">
                                  ทักษะ 
                          </div>  
                              <div class="col-sm-12 my-2">   
                                  <div class="d-block p-2   ">
                                      @foreach ($worker_profile['skill'] as $key => $item )  
                                      <span class="badge text-bg-warning fw-light me-1 ">#{{$item}}</span> 
                                      @endforeach
                                  </div> 
                              </div>
                              
                      </div>
                      <div class=" col-sm-6 ">
                          <div class="h6 text-nowrap pl-3">
                                  สินค้า 
                          </div>  
                              <div class="col-sm-12 my-2">   
                                  <div class="d-block p-2   ">
                                      @foreach ($worker_profile['product'] as $key => $item )  
                                      <span class="badge text-bg-warning fw-light me-1 ">#{{$item}}</span> 
                                      @endforeach
                                  </div> 
                              </div>
                              
                      </div> 
                  </div> 
              </div> 
          </div> 
      </div>

       
  </div>

</section>
<style>

 
</style>