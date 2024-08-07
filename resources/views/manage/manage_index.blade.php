@extends('manage.manage_layout')
@section('title', "จัดการงาน")
@section('description', "")
@section('keywords', "")
@section('content')
    @include('manage.manage_header')
    <div class="bg-manage"></div>
    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
          <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-9 text-center">
              <h1>One Page Bootstrap Website Template</h1>
              <h2>We are team of talented designers</h2>
            </div>
          </div>
          <div class="text-center">
            <a href="#about" class="btn-get-started scrollto">ลงทะเบียน</a>
          </div>
          <div class="container text-center">
            <div class="row row-cols-3">
              <div class="col aos-init aos-animate  " data-aos="zoom-in" data-aos-delay="400"> 
                <a href="">
                <div class="icon"><i class="ri-fingerprint-line" style=" font-size: 3rem; "></i></div>
                สำหรับช่าง</a>  
                <p> <a href="">สำหรับช่าง</a>  </p>
             </div> 
             <div class="col aos-init aos-animate  " data-aos="zoom-in" data-aos-delay="400"> 
                <a href="">
                <div class="icon"><i class="ri-fingerprint-line" style=" font-size: 3rem; "></i></div>
                สำหรับช่าง</a>  
                <p> <a href="">สำหรับช่าง</a>  </p>
             </div> 
             <div class="col aos-init aos-animate  " data-aos="zoom-in" data-aos-delay="400"> 
                <a href="">
                <div class="icon"><i class="ri-fingerprint-line" style=" font-size: 3rem; "></i></div>
                สำหรับช่าง</a>  
                <p> <a href="">สำหรับช่าง</a>  </p>
             </div> 
                
            </div>
          </div>
           
        </div>
      </section>
      <article class="container  card ">
        <div class="container position-relative aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
         
            <div class="container text-center">
              <div class="row row-cols-3">
                <div class="col aos-init aos-animate  " data-aos="zoom-in" data-aos-delay="400"> 
                  <a href="">
                  <div class="icon"><i class="ri-fingerprint-line" style=" font-size: 3rem; "></i></div>
                  สำหรับช่าง</a>  
                  <p> <a href="">สำหรับช่าง</a>  </p>
               </div> 
               <div class="col aos-init aos-animate  " data-aos="zoom-in" data-aos-delay="400"> 
                  <a href="">
                  <div class="icon"><i class="ri-fingerprint-line" style=" font-size: 3rem; "></i></div>
                  สำหรับช่าง</a>  
                  <p> <a href="">สำหรับช่าง</a>  </p>
               </div> 
               <div class="col aos-init aos-animate  " data-aos="zoom-in" data-aos-delay="400"> 
                  <a href="">
                  <div class="icon"><i class="ri-fingerprint-line" style=" font-size: 3rem; "></i></div>
                  สำหรับช่าง</a>  
                  <p> <a href="">สำหรับช่าง</a>  </p>
               </div> 
                  
              </div>
            </div>
             
          </div>
      </article>
   
      <nav class="navbar sticky-bottom bg-body-tertiary"> 
          <article class="container-fluid   ">
            <div class="container position-relative aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
             
                <div class="container text-center">
                  <div class="row row-cols-3">
                    <div class="col aos-init aos-animate  " data-aos="zoom-in" data-aos-delay="200"> 
                      <a href="{{url('/')}}" class="d-inline  icon-bottom">
                        <div class="icon"><i class="fa-solid fa-chalkboard-user"   ></i></div>
                        <span>ดูประกาศทั้งหมด</span> 
                      </a>   
                    </div>
                    <div class="col aos-init aos-animate  " data-aos="zoom-in" data-aos-delay="300"> 
                      <a href="{{url('/worker')}}" class="d-inline  icon-bottom">
                      <div class="icon"><i class="fa-solid fa-user-gear"  ></i></div>
                      <span>สำหรับช่าง</span> 
                    </a>   
                    </div>
                    <div class="col aos-init aos-animate  " data-aos="zoom-in" data-aos-delay="400"> 
                      <a href="{{url('/project_owner')}}" class="d-inline  icon-bottom">
                      <div class="icon"><i class="fa-solid fa-people-roof"  ></i></div>
                      <span>สำหรับผู้ว่าจ้าง </span> 
                      
                    </a>   
                    </div>  
                    
                      
                  </div>
                </div>
                 
              </div>
          </article> 
      </nav>
    @include('layouts.section.ScrollToTop') 
    <style>
     .icon {
        font-size: 1.5rem
      }
      .icon-bottom > span {
        font-size: 0.7rem
      }
       .bg-manage { 
        background: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%),
            radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%, #5d4a1f 100%);
        /* bottom: 25%; */
        left: -50%;
        opacity: .5;
        position: fixed;
        right: -50%;
        top: 0; 
        z-index: -1;
    }

    </style>
    <script>
       
    </script>
@endsection
