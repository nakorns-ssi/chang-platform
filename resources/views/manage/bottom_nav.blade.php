 
<?php 
$profile_display_name = session('account')['profile_display_name'];
$account_code = session('account')['account_code'];
$profile_link = url('/profile/'.$account_code."/".$profile_display_name);
?>
<nav class="navbar fixed-bottom  bg-white border-top shadow">
    <div class="container-fluid">
        <div class=" container-fluid aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

            <div class="  ">
                <div class="row row-cols-3">
                    <div class="col aos-init aos-animate  text-center " data-aos="zoom-in" data-aos-delay="200">
                        <a href="{{ url('/') }}" class="d-inline  icon-bottom">
                            <div class="icon"><i class="fa-solid fa-house"></i></div>
                            <span>หน้าหลัก</span>
                        </a>
                    </div>
                    <div class="col aos-init aos-animate   text-center" data-aos="zoom-in" data-aos-delay="300">
                        <a href="{{$profile_link}}"   class="d-inline  icon-bottom">
                            <div class="icon"><i class="bi bi-person-badge" style="font-size: larger;"></i></div>
                            <span>หน้าโปรไฟล์</span>
                        </a>
                    </div>
                    <div class="col aos-init aos-animate   text-center" data-aos="zoom-in" data-aos-delay="400">
                        <a href="#history" class="d-inline  icon-bottom">
                            <div class="icon"><i class="bi bi-file-earmark-text" style="font-size: larger;"></i> </div>
                            <span>ประวัติการใช้งาน </span>
  
                        </a>
                    </div>
  
  
                </div>
            </div>
  
        </div>
    </div>
  </nav>
<style>
  .icon {
      font-size: 1rem
  }

  .icon-bottom>span {
      font-size: 0.76rem
  }
 
</style>