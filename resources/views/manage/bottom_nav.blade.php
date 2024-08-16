 
<nav class="navbar fixed-bottom  bg-white border-top shadow">
    <div class="container-fluid">
        <div class=" container-fluid aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

            <div class="  ">
                <div class="row row-cols-3">
                    <div class="col aos-init aos-animate  text-center " data-aos="zoom-in" data-aos-delay="200">
                        <a href="{{ url('/') }}" class="d-inline  icon-bottom">
                            <div class="icon"><i class="fa-solid fa-chalkboard-user"></i></div>
                            <span>หน้าหลัก</span>
                        </a>
                    </div>
                    <div class="col aos-init aos-animate   text-center" data-aos="zoom-in" data-aos-delay="300">
                        <a href="{{ url('/worker') }}" class="d-inline  icon-bottom">
                            <div class="icon"><i class="fa-solid fa-user-gear"></i></div>
                            <span>สำหรับช่าง</span>
                        </a>
                    </div>
                    <div class="col aos-init aos-animate   text-center" data-aos="zoom-in" data-aos-delay="400">
                        <a href="{{ url('/project_owner') }}" class="d-inline  icon-bottom">
                            <div class="icon"><i class="fa-solid fa-people-roof"></i></div>
                            <span>สำหรับผู้ว่าจ้าง </span>
  
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