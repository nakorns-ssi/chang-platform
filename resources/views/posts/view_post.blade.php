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
            $btn_share_title =   mb_substr($model->posts_content,0,100)  ;
            $btn_share_text =   mb_substr($model->posts_content,0,100)  ;
            $btn_share_url =   url()->current();
            ?>
            
            <div class="container pb-5">  
                <div class="row"> 
                    <div class="col-12 mt-5">
                        <div class="row justify-content-between">
                            <div class="col-sm-8">
                                @include('posts.view_user_profile' ,['account' => $account ,'posts'=>$model])
                                
                            </div>
                            <div class="col-sm-4  text-end">
                                <button type="button btn-sm" id="btn_share" class="btn btn-success"><i class="bi bi-share"></i> แชร์ให้เพื่อน</button>
                                <input type="hidden" id="btn_share_title" value="{{$btn_share_title}}" > 
                                <input type="hidden" id="btn_share_text" value="{{$btn_share_text}}" > 
                                <input type="hidden" id="btn_share_url" value="{{$btn_share_url}}" > 
                                <script>
                                    const shareData = {
                                    title: document.querySelector("#btn_share_title").value,
                                    text: document.querySelector("#btn_share_text").value,
                                    url: document.querySelector("#btn_share_url").value,
                                    };

                                    const btn = document.querySelector("#btn_share"); 

                                    // Share must be triggered by "user activation"
                                    btn.addEventListener("click", async () => {
                                    try {
                                        await navigator.share(shareData);
                                        resultPara.textContent = "MDN shared successfully";
                                    } catch (err) {
                                        resultPara.textContent = `Error: ${err}`;
                                    }
                                    });
                                </script>
                            </div>
                        </div> 
                        <hr class="w-100" />
                        
                    </div>
                    <div class="col-lg-5  "> 
                        <div class="row">
                            <!--Start Controls-->
                                  <!--First slide-->
                                  @if(count($upload)>0)
                                  @include('layouts.section.Carousel',['upload'=> $upload,'title' =>$model->title ])
                                  @endif
                                  <!--/.First slide-->
                            <!--End Controls-->
                        </div>
                    </div>
                    <!-- col end -->
                    <div class="col-lg-7  ">
                        <div class="h4 mt-2">{{ mb_substr($model->posts_content,0,50) }}</div>
                        <div class="card">
                            <div class="card-body"> 
                                
                                <div class="text-start  ">
                               
                                <div class="text-start text-sm-center">
                                    <!-- Product price--> 
                                    ราคา
                                    @if($model->price_min!=$model->price_max)
                                    <span class="text-dark" >฿{{number_format($model->price_min)}}</span> - 
                                    <span class="text-dark  ">฿{{number_format($model->price_max)}}</span> 
                                    @else
                                    <span class="text-dark" >฿{{number_format($model->price_min)}}</span> 
                                    @endif
            
                                </div>
                                <p class="">  
                                    <i class="bi bi-people-fill"></i> {{number_format($model->item_sold)}} ผู้เข้าชม</span>
                                </p> 
                                <p class="py-1"> 
                                    <ul class="list-inline">
                                        <li class="list-inline-item d-flex aligh-items-center justify-content-start flex-wrap">
                                            <div class="col-auto py-2">
                                                <i class="bi bi-geo-alt-fill "></i>
                                            </div>
                                                
                                            @if($model->location_province)
                                            <div class="col-auto py-2">
                                                <a href="/search?q={{$model->location_province}}" class="   ">
                                                    <span class=' px-2 py-1  fs-6 m-1 rounded-pill  text-bg-warning '>
                                                        #{{$model->location_province}}
                                                    </span> 
                                                </a>
                                            </div>
                                            <div class="col-auto py-2">
                                                <a href="/search?q={{$model->location_amphoe}}" class="   ">
                                                    <span class='px-2 py-1 fs-6 m-1 rounded-pill  text-bg-warning '>
                                                        #{{$model->location_amphoe}}
                                                    </span> 
                                                </a>
                                            </div>
                                            <div class="col-auto py-2">
                                                <a href="/search?q={{$model->location_district}}" class="   ">
                                                    <span class='px-2 py-1 fs-6 m-1 rounded-pill  text-bg-warning '>
                                                        #{{$model->location_district}}
                                                    </span> 
                                                </a>
                                            </div>
                                            @else
                                            <div class="col-auto py-2">
                                                <span> ไม่ระบุ</span>
                                            </div>
                                            @endif
                                        </li> 
                                    </ul>
                                </p>
            
                                <h6>รายละเอียด:</h6>
                                <p>{!! nl2br($model->posts_content) !!}</p>
            
                            
                            </div>
                        </div> 

                        
                         
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
