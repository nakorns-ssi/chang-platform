@extends('layouts.main_layout')
@section('title', $page_title)
@section('description', "")
@section('keywords', "")
@section('content') 
@include('layouts.Header')  
<?php 
use App\helper\util; 
use App\helper\helper_lang; 
?>
<section class="container  " style="margin-top:80px;"  >  
    <div class="mb-2 row justify-content-between">
        <div class="col-6  text-start">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url("/")}}"><i class="fa-solid fa-house"></i> หน้าแรก</a></li>
                  <li class="breadcrumb-item active" aria-current="page">ค้นหา </li>
                </ol>
              </nav>
        </div>
        <div class="col-6  text-end"> 
         <div class=" ">ผลการค้นหา ทั้งหมด {{ count($model) }} รายการ</div>  
        </div>
    </div>
    <article id="search_hero" class="   mt-1 text-center">
        <div class="overlay padd-section">
          <div class="container aos-init aos-animate" data-aos="zoom-in"> 
            <div class="row justify-content-center">
              <div class="col-md-9 col-lg-6 sarabun-regular">
                @include('search.search_bar')
              </div> 
              
            </div>
            <div class="row justify-content-start">
              <div class="col-md-6 col-lg-4  text-start py-1 px-5  "> 
                @foreach($keyword as $word)
                <span class="badge border text-dark"># {{$word}}</span> 
                @endforeach
                @if(count($keyword)>0)
                <a class="btn text-danger" href="/search" role="button">
                  <i class="bi bi-trash"></i></a> 
                @endif
              </div>  
            </div>
      
          </div>
        </div>
      </article>

    @if(count($model)>0)
      <div class="text-center text-sm-start   container mt-2">
        <h5 class="text-danger text-decoration-underline" >โพสต์ ({{ number_format(count($model)) }})</h5> 
      </div> 
      <div class="row mt-2 gx-1 gx-lg-4 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 justify-content-start">
        
          @foreach ($model as $key => $value)
          <?php $url_slug = url("/post/{$value->posts_key}"."/".util::slugify($value->posts_content) );  ?>
              <div class="col-lg-4 col-md-6  my-1 "> 
                <a href="{{$url_slug}}">
                  @include('layouts.section.PostCard' )  
                </a>
              </div>  
          @endforeach 
      </div> 
    @endif
    <div class="mt-2 row justify-content-center"> 
      <div class="col-12 pagination-custom d-flex justify-content-center">
          @if (count($model) > 0)
              {{ $model->links() }}
          @else
              ไม่พบรายการโพสต์
          @endif
      </div>
  </div> 

    @if(count($Account_list)>0)
    <div class="text-center text-sm-start pt-2 container mt-2">
      <h5 class="text-danger text-decoration-underline" >โปรไฟล์ ({{ number_format(count($Account_list))  }})</h5>  
    </div> 
    <div class="row mt-2 gx-1 gx-lg-4 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 justify-content-start">
      
        @foreach ($Account_list as $key => $account)
        <?php 
        $profile_display_name = $account->profile_display_name ;
        $profile_display_url = $account->profile_display_url ;
        $account_code = $account->account_code ;
        $url_link_profile = url('profile/'.$account_code."/".util::slugify($profile_display_name));
        ?>
            <div class="col-lg-4 col-md-6  my-1 ">
              <a href="{{$url_link_profile}}"   class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"> 
              @include('layouts.section.AccountCard' ,['account' => $account  ])
              </a>
            </div>  
        @endforeach 
    
    @endif
      
   

    


  
</section>
    @include('layouts.section.ScrollToTop') 
    <style> 
    </style>
    <script> 
    </script>
@endsection
