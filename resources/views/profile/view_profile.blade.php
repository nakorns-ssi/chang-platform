@extends('layouts.main_layout')
@section('title', $page_title)
@section('description', "")
@section('keywords', "")
@section('content') 
@include('layouts.Header') 
    <main class="content bg-light" style="margin-top:80px"> 
        <div class="container py-2">
            <?php 
            use Illuminate\Support\Str;
            use App\helper\util; 
            $Product_image_url = []; 
            $link = '/';
            ?>
            
            <div class="container pb-5">  
                <div class="row g-1"> 
                    <div class="col-12 mt-5">
                        <div class="my-2">
                            @include('posts.view_btn_profile' ,['account_code' => $model->account_code])
                            <hr class="w-100" />
                        </div> 
                    </div> 
                    <!-- col end -->
                    <div class="col-md-5  ">
                        @include('profile.contact_profile',['title'=>'ติดต่อ' ,'model'=>$model]) 
                        @include('profile.skills_profile',['title'=>'ความถนัด' ,'model'=>$worker_profile['profile_ability']]) 
                        @include('profile.skills_profile',['title'=>'ทักษะพิเศษ' ,'model'=>$worker_profile['profile_skills'] ]) 
                        {{-- @include('profile.review_profile',['title'=>'รีวิว'])  --}}
 
                    </div>
                    <div class="col-md-7  ">
                        @include('layouts.section.PostRecommendTab',['model'=>$posts])
                 
                         
                    </div>
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
