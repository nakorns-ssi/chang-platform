@extends('layouts.main_layout')
@section('title', $page_title)
@section('description', "")
@section('keywords', "")
@section('content') 
@include('layouts.Header') 
    <main class="container  bg-light" style="margin-top:80px">  
            <?php 
            use Illuminate\Support\Str;
            use App\helper\util; 
            $Product_image_url = []; 
            $link = '/';
            $display_name = $model->display_name ;
            $profile_display_url = $model->profile_display_url ;
            $account_code = $model->account_code ;
            ?>
             
            <article class="bg-white d-flex justify-content-center align-items-center   mt-4 position-relative "
            style="padding-top: 80px;" >  
                
                    <div class="c-avatar d-block position-absolute top-100 start-50 translate-middle"
                    style="  height: 80px;  width: 80px; ">
                        <img src="{{ $profile_display_url }}" class="c-avatar" alt="{{ $display_name }} โปรไฟล์"
                            loading="lazy" style="" /> 
                <span class="text-center text-success text-bold text-nowrap">{{ $display_name }} </span>
                           
                    </div>  
            </article>
            <div class="  p-4">  
                <div class="row g-1"> 
                    <div class="col-12 mt-5"> 
                       @include('profile.contact_profile',['title'=>'ติดต่อ' ,'model'=>$model])   
                    </div>
                    <div class="col-12 "> 
                        @include('profile.profile_work',['title'=>'ประวัติการทำงาน' ,'model'=>$worker_profile['profile_work_history']])   
                    </div>
                    <div class="col-12 "> 
                        @include('profile.profile_work',['title'=>'ผลงาน' ,'model'=>$worker_profile['profile_project']])   
                    </div>
                    <div class="col-12 ">
                    @if(isset($worker_profile['work_category']))
                        @include('profile.skills_profile',['title'=>'ประเภทงาน' ,'model'=>$worker_profile['work_category']])   
                    @endif
                    </div>
                    <div class="col-12 ">
                     @if(isset($worker_profile['work_sub_category'])) 
                        @include('profile.skills_profile',['title'=>'ประเภทงานย่อย' ,'model'=>$worker_profile['work_sub_category']]) 
                     @endif  
                    </div>
                    <div class="col-12 ">
                        @if(isset($worker_profile['skill']))
                            @include('profile.skills_profile',['title'=>'ทักษะ' ,'model'=>$worker_profile['skill']])
                        @endif 
                    </div>
                    <div class="col-12 ">
                        @if(isset($worker_profile['product']))
                             @include('profile.skills_profile',['title'=>'สินค้า' ,'model'=>$worker_profile['product']])   
                        @endif 
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
