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
                <div class="row"> 
                    <div class="col-12 mt-5">
                        <div class="my-2">
                            @include('posts.view_user_profile' ,['account' => $account ,'posts'=>$model])
                            <hr class="w-100" />
                        </div>
                        
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
                    <div class="col-lg-7 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="GET" class="mt-2 d-none">
                                    <input type="hidden" name="product-title" value="Activewear">
            
                                    <div class="row pb-3">
                                        <div class="col d-grid"> 
                                           
                                        </div>
                                        <div class="col d-grid">
                                            <a class="btn btn-success  " href="{{$link}}" role="button"><i
                                                    class="bi bi-share"></i> แชร์ให้เพื่อน</a>
                                        </div>
                                    </div>
                                </form>
                                <h1 class="h4">{{$model->title}}</h1>
                                <div class="text-start text-sm-center">
                                    <!-- Product price--> 
                                    @if($model->price_min!=$model->price_max)
                                    <span class="text-dark" >฿{{number_format($model->price_min)}}</span> - 
                                    <span class="text-dark  ">฿{{number_format($model->price_max)}}</span> 
                                    @else
                                    <span class="text-dark" >฿{{number_format($model->price_min)}}</span> 
                                    @endif
            
                                </div>
                                <p class="py-2">
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <span class="list-inline-item text-dark">Rating {{$model->item_rating}} |
                                        {{number_format($model->item_sold)}} เข้าชม</span>
                                </p>
                                <ul class="list-inline">
                                    <li class="list-inline-item d-flex flex-wrap">
                                        <h6 class="d-inline"><i class="bi bi-geo-alt-fill   "></i></h6> 
                                        @if($model->location_province)
                                            <a href="/search?q={{$model->location_province}}" class="my-2  ">
                                                <span class='badge fs-6 m-1 rounded-pill  text-bg-warning d-inline'>
                                                    {{$model->location_province}}
                                                </span> 
                                            </a>
                                            <a href="/search?q={{$model->location_amphoe}}" class="my-2  ">
                                                <span class='badge fs-6 m-1 rounded-pill  text-bg-warning d-inline'>
                                                    {{$model->location_amphoe}}
                                                </span> 
                                            </a>
                                            <a href="/search?q={{$model->location_district}}" class="my-2  ">
                                                <span class='badge fs-6 m-1 rounded-pill  text-bg-warning d-inline'>
                                                    {{$model->location_district}}
                                                </span> 
                                            </a>
                                        @endif
                                    </li>
                                   
                                </ul>
            
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
