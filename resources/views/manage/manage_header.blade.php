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
    
          <h5 class="logo "><a href="/manage">หน้าจัดการงาน</a></h5>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    
          <nav id="navbar" class="navbar">
            <ul>
              
              <li><a class="nav-link scrollto " href="/"><span><i class="bi bi-file-earmark-text" style="font-size: larger;"></i> ดูประกาศหน้าแรก </span></a></li>
              <li><a class="nav-link scrollto" href="#notification"><span><i class="bi bi-bell" style="font-size: larger;"></i> แจ้งเตือน</span></a></li> 
           
              <li><a class="nav-link scrollto  " href="/auth/logout"><span><i class="bi bi-box-arrow-right" style="font-size: larger;"></i> ออกจากระบบ</span></a></li>
              
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
    
        </div>
      </header><!-- End Header -->
      <style>
 
      </style>