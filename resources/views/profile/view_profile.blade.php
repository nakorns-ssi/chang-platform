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
                            @include('posts.view_btn_profile' ,['account_code' => $model->account_code])
                            <hr class="w-100" />
                        </div>
                        
                    </div>
                    <div class="col-lg-5  ">
             
                        <div class="card my-2">
                            <div class="card-body">
                                 
                                <h1 class="h4"> </h1>
                                <div class="text-start text-sm-center">
                                    <!-- Product price--> 
                               
            
                                </div>
                                <p class="py-2">
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <span class="list-inline-item text-dark">Rating 5 |
                                         0 เข้าชม</span>
                                </p>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <h6 class="d-inline"><i class="bi bi-geo-alt-fill   "></i></h6>
                                         
                                    </li>
                                    <li class="list-inline-item">
                                        <p class="text-muted"><strong> </strong></p>
                                    </li>
                                </ul>
            
                                <h6>รายละเอียด:</h6>
                                <p> </p> 
                            </div>
                        </div> 
                         
                    </div>
                    <!-- col end -->
                    <div class="col-lg-7  ">
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="GET" class="mt-2 d-none">
                                    <input type="hidden" name="product-title" value="Activewear">
            
                                    <div class="row pb-3">
                                        <div class="col d-grid"> 
                                           
                                        </div>
                                        <div class="col d-grid">
                                            <a class="btn btn-success  " href="#" role="button"><i
                                                    class="bi bi-share"></i> แชร์ให้เพื่อน</a>
                                        </div>
                                    </div>
                                </form>
                                <h1 class="h4"> </h1>
                                <div class="text-start text-sm-center">
                                    <!-- Product price--> 
                               
            
                                </div>
                                <p class="py-2">
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <span class="list-inline-item text-dark">Rating 5 |
                                         0 เข้าชม</span>
                                </p>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <h6 class="d-inline"><i class="bi bi-geo-alt-fill   "></i></h6>
                                         
                                    </li>
                                    <li class="list-inline-item">
                                        <p class="text-muted"><strong> </strong></p>
                                    </li>
                                </ul>
            
                                <h6>รายละเอียด:</h6>
                                <p> </p>
            
                            
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
