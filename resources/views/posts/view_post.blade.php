@extends('layouts.main_layout')
@section('title', $page_title)
@section('description', "")
@section('keywords', "")
@section('content') 
@include('layouts.Header') 
    <main class="content" style="margin-top:80px"> 
        <div class="container py-2">
            <?php 
            use Illuminate\Support\Str;
            use App\helper\util; 
            $Product_image_url = []; 
            $link = '/';
            ?>
            
            <div class="container pb-5"> 
                <div class="row">
                  
                    <div class="col-lg-5 mt-5">
             
                      
                        <div class="row">
                            <!--Start Controls-->
                                  <!--First slide--> 
                                  @include('layouts.section.Carousel',['upload'=> $upload,'title' =>$model->title ])
                                  <!--/.First slide-->
                            <!--End Controls-->
                        </div>
                    </div>
                    <!-- col end -->
                    <div class="col-lg-7 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="GET" class="mt-2">
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
                                    <span class="lead text-danger">฿{{number_format($model->sale_price)}}</span>
                                    <span class="text-muted text-decoration-line-through ">฿{{$model->price}}</span>
            
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
                                    <li class="list-inline-item">
                                        <h6 class="d-inline"><i class="bi bi-geo-alt-fill   "></i></h6>
                                        
                                            
                                        
                                            <a href="/search?q={{$model->location_province}}" class=" ">
                                                <span class='badge fs-6 my-1 rounded-pill  text-bg-warning d-inline'>
                                                    {{$model->location_province}}
                                                </span> 
                                            </a>
                                            <a href="/search?q={{$model->location_amphoe}}" class=" ">
                                                <span class='badge fs-6 my-1 rounded-pill  text-bg-warning d-inline'>
                                                    {{$model->location_amphoe}}
                                                </span> 
                                            </a>
                                            <a href="/search?q={{$model->location_district}}" class=" ">
                                                <span class='badge fs-6 my-1 rounded-pill  text-bg-warning d-inline'>
                                                    {{$model->location_district}}
                                                </span> 
                                            </a> 
                                    </li>
                                    <li class="list-inline-item">
                                        <p class="text-muted"><strong>{{$model->global_brand}}</strong></p>
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
