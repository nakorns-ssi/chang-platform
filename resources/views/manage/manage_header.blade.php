     <?php
     $url_current = url()->current();
    if (isset(explode('/', $url_current)[5])) {
        $route_web = explode('/', $url_current)[5];
    } else {
        $route_web = null;
    }  
    $profile_display_name = session('account')['profile_display_name'];
    $account_code = session('account')['account_code'];
    $profile_link = url('/profile/'.$account_code."/".$profile_display_name);
    ?>
    <!-- ======= Header ======= -->
     <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
    
          <h5 class="logo "><a href="/"><i class="fa-solid fa-house" style="font-size: larger;"></i> ดูประกาศหน้าหลัก</a></h5>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
    
          <nav id="navbar" class="navbar">
            <ul>
              
              <li><a class="nav-link scrollto" href="{{$profile_link}}"><span><i class="bi bi-person-badge" style="font-size: larger;"></i> หน้าโปรไฟล์</span></a></li> 
              <li><a class="nav-link scrollto " href="#history"><span><i class="bi bi-file-earmark-text" style="font-size: larger;"></i> ประวัติการใช้งาน </span></a></li>
           
              <li><a class="nav-link scrollto  " href="/auth/logout"><span><i class="bi bi-box-arrow-right" style="font-size: larger;"></i> ออกจากระบบ</span></a></li>
              
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
    
        </div>
      </header><!-- End Header -->
      <style>
 
      </style>