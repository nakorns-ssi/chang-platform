@extends('layouts.main_layout')
@section('title', $page_title)
@section('description', "")
@section('keywords', "")
@section('content') 
@include('layouts.Header')  

<section class="container  " style="margin-top:80px;"  >  
    <div class="mb-2 row justify-content-between">
        <div class="col-6  text-start">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url("/")}}"><i class="fa-solid fa-house"></i> หน้าแรก</a></li>
                  <li class="breadcrumb-item active" aria-current="page">ค้นหา {{$page_title}}</li>
                </ol>
              </nav>
        </div>
        <div class="col-6  text-end">
            ทั้งหมด {{ count($model) }} รายการ
        </div>
    </div>
    <article id="search_hero" class="   mt-1 text-center">
        <div class="overlay padd-section">
          <div class="container aos-init aos-animate" data-aos="zoom-in"> 
            <div class="row justify-content-center">
              <div class="col-md-9 col-lg-6 sarabun-regular">
                <form action="{{url('search/')}}">
                  <input type="text" class="  px-2" name="q" placeholder="ระบุคำค้นหา..."  >
                  <button type="submit" class=" "><i class="bi bi-search"></i>ค้นหา</button>
                </form>
              </div> 
              
            </div>
             
      
          </div>
        </div>
      </article> 
    <div class="row mt-4 gx-1 gx-lg-4 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-start">
        @foreach ($model as $key => $value)
            <div class="col-lg-4 col-md-6  my-1 "> 
                @include('layouts.section.PostCard'  )  
            </div>  
        @endforeach 
    </div>
      
   

    <div class="mt-2 row justify-content-center">

        <div class="col-12 pagination-custom d-flex justify-content-center">
            @if (count($model) > 0)
                {{ $model->links() }}
            @else
                ไม่พบรายการ
            @endif
        </div>
    </div> 


  
</section>
    @include('layouts.section.ScrollToTop') 
    <style> 
    </style>
    <script> 
    </script>
@endsection
