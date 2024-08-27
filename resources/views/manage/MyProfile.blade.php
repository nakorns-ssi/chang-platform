<article class="bg-white d-flex align-items-center py-4  my-2">
    <div class="container   aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        <div class="d-flex align-items-center py-2">
            <div class="flex-grow-1">
                <a href="/manage/user_profile"> 
                    <span class="text-center text-success  ">
                        <p>
                            <img src="{{ session('account')['profile_display_url'] }}" class="  rounded  " alt="โปรไฟล์"
                                loading="lazy" style="width: 5rem;minmax(3rem, 48px);" />
                        </p>
                        <p>
                            <span class="text-center text-success text-bold">{{ session('account')['display_name'] }} </span>
                        </p> 
                        <p>
                        <i class="bi bi-pencil-square" style=" "></i>
                        แก้ไขข้อมูลส่วนตัว    
                        </p> 
                    </span>
                </a> 
            </div>
        </div> 
    </div>
</article>

 