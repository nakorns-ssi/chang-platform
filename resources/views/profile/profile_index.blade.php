@extends('layouts.main_layout')
@section('title', $page_title)
@section('description', "")
@section('keywords', "")
@section('content') 
@include('layouts.Header') 
    <main class="container   " style="margin-top:115px">  
            <?php 
            use Illuminate\Support\Str;
            use App\helper\util; 
            $Product_image_url = []; 
            $link = '/';
            $display_name = $model->display_name ;
            $profile_display_url = $model->profile_display_url ;
            $account_code = $model->account_code ;
            ?>

            <article class=" pt-5  "  style=" " >   
                <div class="container   " >
                   
                    <div class="row justify-content-center ">
                        <div class="col-sm-10 col-md-8  border border-dark rounded-4"  style=" background: var(--bs-primary); ">
                            <div class="float-end"><a  href="#" onclick="show_qr_profile({{$model->account_code}})" class="text-dark fs-1"><i class="bi bi-qr-code"></i>  </a></div>
                            <div class="row    ">
                                <div class="col-sm-4">
                                    <div class="my-3 px-3 text-center">
                                        <div class="text-center">
                                            <img src="{{ $profile_display_url }}" class="c-avatar mx-auto d-block"  style="  height: 80px;  width: 80px; "
                                            alt="{{ $display_name }} โปรไฟล์"  loading="lazy" style="" /> 
                                        </div> 
                                        <div> {{ $display_name }}</div>
                                    </div>   
                                </div>
                                <div class="col-sm-8  ">
                                    <div class="my-3   text-start"> 
                                        <ul class="list-inline">
                                            <li class="list-inline-item">   
                                                <a href="tel:{{$model->profile_phone}}">
                                                    <h6 class="d-inline text-dark  fw-normal" style="" ><i class="bi bi-telephone-fill" style="font-size: larger" ></i>  
                                                        @if($model->profile_phone)
                                                        {{$model->profile_phone}} 
                                                        @else
                                                        ไม่ระบุ
                                                        @endif
                                                    </h6>
                                                </a>   
                                            </li> 
                                        </ul>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">   
                                                <a href="mailto:{{$model->profile_email}}">
                                                    <h6 class="d-inline text-dark  fw-normal" style="" ><i class="bi bi-envelope" style="font-size: larger" ></i>  
                                                        @if($model->profile_email)
                                                        {{$model->profile_email}} 
                                                        @else
                                                        ไม่ระบุ
                                                        @endif
                                                    </h6>
                                                </a>   
                                            </li> 
                                        </ul>
                                        @if($model->add_line_id)
                                        <ul class="list-inline">
                                            <li class="list-inline-item">   
                                                <a href="https://line.me/ti/p/~{{$model->add_line_id}}" target="_blank">
                                                    <h6 class="d-inline text-dark  fw-normal" style="" ><i class='fab fa-line   ' style='font-size: larger '></i>   
                                                        @if($model->add_line_id)
                                                        {{$model->add_line_id}} 
                                                        @else
                                                        ไม่ระบุ
                                                        @endif
                                                    </h6>
                                                </a>   
                                            </li> 
                                        </ul>
                                        @endif
                                    </div>   
                                </div> 
                            </div> 
                            <div class="float-end mb-2"> 
                                @include('layouts.section.btnShare', ['content_share' => $display_name]) 
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2 d-none">
                            <div class="col-sm-10 col-md-8 text-end">  
                            @include('layouts.section.btnShare', ['content_share' => $display_name])
                        </div>
                    </div>
                    
                    </div>
                    <div class="row justify-content-center ">
                        <div class="col-sm-10 col-md-8 "> 
                            
                           {{-- @include('profile.contact_profile',['title'=>'ติดต่อ' ,'model'=>$model]) --}}
                           @include('layouts.section.WorkProfile_view', ['account_id' => $account_id])
                        </div>
                    </div>
                 
                </div> 
            </article>
              
            <div class="  "> 
                
                <div class="row g-1"> 
             
                   
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
