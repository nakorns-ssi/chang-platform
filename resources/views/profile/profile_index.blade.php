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

            <article class=" pt-5"  style=" " >   
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-6">
                            <div class="col-12 text-center">
                                <div class="text-center">
                                    <img src="{{ $profile_display_url }}" class="c-avatar mx-auto d-block"  style="  height: 80px;  width: 80px; "
                                    alt="{{ $display_name }} โปรไฟล์"  loading="lazy" style="" /> 
                                </div> 
                                <div> {{ $display_name }}</div>
                            </div>   
                        </div> 
                    </div>
                </div> 
            </article>
              
            <div class=" mt-2">  
                <div class="row g-1"> 
                    <div class="col-12 "> 
                       @include('profile.contact_profile',['title'=>'ติดต่อ' ,'model'=>$model])   
                    </div>
                    @include('layouts.section.WorkProfile_view', ['account_id' => $account_id])
                   
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
