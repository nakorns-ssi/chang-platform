     <?php
     $url_current = url()->current();
     if (isset(explode('/', $url_current)[5])) {
         $route_web = explode('/', $url_current)[5];
     } else {
         $route_web = null;
     }
     ?>
     <!-- ======= Header ======= -->
     <header id="header" class="fixed-top">
         <div class="container d-flex align-items-center justify-content-between">
            
                 <div class=" row align-items-center">
                     <div class="col-md-12 text-center">
                         {{-- <h1 class="logo"><a href="/">ช่างเหล็ก.com</a></h1> --}}
                         <img class="  img-fluid " src="{{ asset('chang_prompt/img/chang_prompt_logo.svg') }}"
           alt="{{env('APP_NAME')}} โลโก้ ช่างเหล็ก.com" style="width: 5rem;min-width: 5rem;" >
                     </div>
                     <div class="col-md-12 text-center">
                      @if (session()->has('account'))
                      <div class="d-md-none">
                          @include('layouts.Btn_Profile') 
                      </div>
                      @endif
                     </div>

                 </div>
             
             <!-- Uncomment below if you prefer to use an image logo -->
             <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

             <nav id="navbar" class="navbar">
                 <ul>
                  <li><a class="nav-link scrollto active" href="/">ประกาศทั้งหมด</a></li>
                  <li><a class="nav-link scrollto " href="/worker">โพสต์ช่าง</a></li>
                  <li><a class="nav-link scrollto" href="/project_owner">โพสต์ผู้ว่าจ้าง</a></li> 
                  <li>
                    @if (session()->has('account')) 
                    <div class=" d-sm-block">
                      @include('layouts.Btn_Profile') 
                    </div> 
                    @endif
                    @if (!session()->has('account')) 
                         <a class=" " href="/auth/login">
                          <span><i class="bi bi-person fa-beat-fade"
                           style="font-size: larger;"></i>เข้าสู่ระบบ</a></span> 
                    @endif
                    </li> 
                 </ul>
                 <i class="bi bi-list mobile-nav-toggle"></i>
             </nav><!-- .navbar -->

         </div>
     </header><!-- End Header -->
     <style>

     </style>
