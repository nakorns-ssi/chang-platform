<article class="bg-light d-flex align-items-center  my-2">
    <div class="container   aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        <div class="d-flex align-items-start py-2">
            <div class="flex-grow-1">
                <a href="/posts">
                    <span class="float-start text-success text-bold" style=" border-bottom: 2px solid;">
                        สำหรับช่าง
                    </span>
                    <span class="float-end text-success icon-menu-label">ดูทั้งหมด<i class="bi bi-chevron-right"
                            style="font-size: larger;"></i>
                    </span>
                </a> 
            </div>
        </div> 
    </div>
</article>

<article class="container  card bg-white my-2">
    <div class="container position-relative aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

        <div class="container px-0 text-center">
            <div class="row row-cols-3 align-items-center">
                <div class="col  aos-init aos-animate   " data-aos="zoom-in" data-aos-delay="100">
                    <a href="/manage/worker/post/add" onclick="do_loading()"  >
                    <span class=" row  text-dark">
                        <div class="col-12 d-flex justify-content-center py-2">
                            <div class="icon icon-menu position-relative">
                                <i class="bi bi-file-earmark-plus  position-absolute top-50 start-50 translate-middle"></i>
                            </div>
                        </div> 
                        <span class="col-12  fw-light icon-menu-label py-2" >สร้างโพสต์ใหม่ </span> 
                    </span> 
                    </a>   
                </div>
                <div class="col  aos-init aos-animate   " data-aos="zoom-in" data-aos-delay="100">
                    <a href="/manage/worker/post"  onclick="do_loading()" >
                    <span class=" row  text-dark">
                        <div class="col-12 d-flex justify-content-center py-2">
                            <div class="icon icon-menu position-relative"> 
                                <i class="bi bi-file-text  position-absolute top-50 start-50 translate-middle"></i>
                            </div>
                        </div> 
                        <span class="col-12  fw-light icon-menu-label py-2" >ดูโพสต์ทั้งหมด</span> 
                    </span> 
                    </a>   
                </div>
                
                 

            </div>
        </div>

    </div>
</article>

<style>
    i > .bi { 
    }
    .icon-menu {
        height: 2rem;
        width: 2rem;
        background-color: var(--bs-primary);
        border-radius: 50%;
    }
    .icon-menu-label { 
  }

</style>