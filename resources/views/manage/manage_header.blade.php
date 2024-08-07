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
    
          <h1 class="logo"><a href="/">ช่างเหล็ก.com</a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    
          <nav id="navbar" class="navbar">
            <ul>
              @if (session()->has('account')) 
                <li class=" "><a href="{{url('/manage')}}" class="btn btn-outline-secondary bg-light px-4 mx-2"> 
                  <div class="row g-0">
                    <div class="col-4"> 
                        <img src="{{(session('account')['display_url'])}}"
                            class="  rounded  " height="48" alt="โปรไฟล์" loading="lazy" />  
                         
                    </div>
                    <div class="col-8 px-2">
                        {{session('account')['display_name']}}  
                        <br/>
                          จัดการงาน 
                    </div>
                  </div>
                   
                </a> 
                </li>
              @else
                <li><a class=" " href="/auth/login">
                 <span><i class="bi bi-person fa-beat-fade"  style="font-size: larger;"></i>เข้าสู่ระบบ</a></span> </li>
              @endif 
              <li><a class="nav-link scrollto active" href="/">ประกาศทั้งหมด</a></li>
              <li><a class="nav-link scrollto " href="/worker">รับงาน</a></li>
              <li><a class="nav-link scrollto" href="/project_owner">หาช่าง</a></li> 
              <li><a class="nav-link scrollto" href="#notification"><span><i class="bi bi-bell" style="font-size: larger;"></i>แจ้งเตือน</span></a></li> 
          
              
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
    
        </div>
      </header><!-- End Header -->
      <style>
 
      </style>