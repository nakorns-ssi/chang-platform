@extends('layouts.main_layout')
@section('title', $page_title)
@section('description', "")
@section('keywords', "")
@section('content') 
@include('layouts.Header') 
    <main class="content-fluid bg-light" style="margin-top:80px">  
            <?php 
            use Illuminate\Support\Str;
            use App\helper\util; 
            $Product_image_url = []; 
            $link = '/';
            $display_name = $model->display_name ;
            $profile_display_url = $model->profile_display_url ;
            $account_code = $model->account_code ;
            ?>
            <article class="bg-white d-flex justify-content-center align-items-center pt-5 mt-4 position-relative ">  
                <div class="mt-4">
                    <div class="c-avatar d-block position-absolute top-100 start-50 translate-middle"
                    style="  height: 80px;  width: 80px; ">
                        <img src="{{ $profile_display_url }}" class="c-avatar" alt="{{ $display_name }} โปรไฟล์"
                            loading="lazy" style="" />
                        <div class="d-block">
                            <span class="text-center text-success text-bold h5">{{ $display_name }} </span>
                        </div> 
                    </div>
                </div> 
            </article>
            <div class="  p-4">  
                <div class="row g-1"> 
                    <div class="col-12 mt-5"> 
                       @include('profile.contact_profile',['title'=>'ติดต่อ' ,'model'=>$model])   
                    </div> 
                    <div class="col-12  "> 
                        <div class="card my-2">
                            <div class="card-body row justify-content-center">
                                @if(isset($worker_profile['work_category']))
                                <div class="col-sm-3 my-2"> 
                                    @include('profile.skills_profile',['title'=>'ประเภทงาน' ,'model'=>$worker_profile['work_category']]) 
                                </div>
                                @endif
                                @if(isset($worker_profile['work_sub_category']))
                                <div class="col-sm-3 my-2"> 
                                    @include('profile.skills_profile',['title'=>'ประเภทงานย่อย' ,'model'=>$worker_profile['work_sub_category']]) 
                                </div>
                                @endif
                        
                                @if(isset($worker_profile['skill']))
                                <div class="col-sm-3 my-2"> 
                                    @include('profile.skills_profile',['title'=>'ทักษะ' ,'model'=>$worker_profile['skill']]) 
                                </div>
                                @endif
                    
                                @if(isset($worker_profile['product']))
                                <div class="col-sm-3 my-2"> 
                                    @include('profile.skills_profile',['title'=>'สินค้า' ,'model'=>$worker_profile['product']]) 
                                </div>
                                @endif 
                            </div>
                        </div>
                     </div> 
                    <!-- col end --> 
                    <div class="col-12">
                        @include('layouts.section.PostRecommendTab',['model'=>$posts]) 
                    </div>
                  
                </div>
            </div>
             
    </main> 
    @include('layouts.section.ScrollToTop') 
    <style> 
    </style>
    <script> 
    </script>
@endsection
