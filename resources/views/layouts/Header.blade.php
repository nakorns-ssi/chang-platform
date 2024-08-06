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
                <li class="dropdown"><a href="#"> 
                   <span><i class="bi bi-person"  style="font-size: larger;"></i> {{session('account')['display_name']}} <i class="bi bi-chevron-down"></i></span>
                </a>
                  <ul>
                    <li><a href="#"><span>
                      <img src="{{(session('account')['display_url'])}}"
                      class=" dropdown-toggle rounded shadow" height="48" alt="โปรไฟล์" loading="lazy" /> โปรไฟล์
                    </span>
                      </a>
                    </li>
                    <li class="dropdown"><a href="#"><span>โพสต์ของฉัน</span> <i class="bi bi-chevron-right"></i></a>
                      <ul>
                        <li><a href="{{ url('/post/worker') }}">โพสต์รับงาน</a></li> 
                        <li><a href="{{ url('/post/project_owner') }}">โพสต์หาช่าง</a></li> 
                      </ul>
                    </li> 
                    <li><a href="{{ url('/auth/logout') }}">ออกจากระบบ</a></li> 
                  </ul>
                </li>
              @else
                <li><a class=" " href="/auth/login">
                 <span><i class="bi bi-person fa-beat-fade"  style="font-size: larger;"></i>เข้าสู่ระบบ</a></span> </li>
              @endif 
              <li><a class="nav-link scrollto active" href="/">ประกาศทั้งหมด</a></li>
              <li><a class="nav-link scrollto " href="/worker">รับงาน</a></li>
              <li><a class="nav-link scrollto" href="/project_owner">หาช่าง</a></li> 
              <li><a class="nav-link scrollto" href="#notification"><span><i class="bi bi-bell" style="font-size: larger;"></i>แจ้งเตือน</span></a></li> 
              <li><a class="nav-link scrollto" href="/about_us">เกี่ยวกับเรา</a></li> 
              
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
    
        </div>
      </header><!-- End Header -->
      <style>
 
      </style>