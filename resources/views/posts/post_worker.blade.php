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
             
                        <div class="card mb-3">
                            @if(isset($upload[0]->url))
                            <img class="card-img img-fluid" src="{{$upload[0]->url}}" alt="รูปสินค้า {{$model->title}}"
                                id="product-detail">
                            @endif
                        </div>
                        <div class="row">
                            <!--Start Controls-->
                            <div class="col-1 align-self-center">
                                <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                    <i class="text-dark fas fa-chevron-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </div>
                            <!--End Controls-->
                            <!--Start Carousel Wrapper-->
                            <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                                <!--Start Slides-->
                                <div class="carousel-inner product-links-wap" role="listbox">
            
            
                                    <!--First slide-->
                                    <div class="carousel-item active">
                                        <div class="row">
                                            @foreach($upload as $key => $img)
                                            <?php    ?>
                                            <div class="col-4">
                                                <a href="{{$img->url}}" target="_blank">
                                                    <img class="card-img img-fluid" src="{{$img->url}}" alt="Post Image {{$key}}">
                                                </a>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!--/.First slide-->
            
            
            
                                </div>
                                <!--End Slides-->
                            </div>
                            <!--End Carousel Wrapper-->
                            <!--Start Controls-->
                            <div class="col-1 align-self-center">
                                <a href="#multi-item-example" role="button" data-bs-slide="next">
                                    <i class="text-dark fas fa-chevron-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
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
                                        {{number_format($model->item_sold)}} ขายแล้ว</span>
                                </p>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <h6>Brand:</h6>
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
