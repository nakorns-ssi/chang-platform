<article class="bg-white d-flex align-items-center py-4  my-2">
    <div class="container   aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        <div class="d-flex align-items-center py-2">
            <div class="flex-grow-1">
                <a href="/manage/profile">
                    <div>
                        <span class="float-start text-success text-bold">
                            <img src="{{ session('account')['display_url'] }}" class="rounded-circle  "
                    height="64" alt="โปรไฟล์" loading="lazy" />  
                        </span>
                        <span class="float-start text-success text-bold">{{ session('account')['display_name'] }} </span>
                    </div> 
                    <span class="float-end text-success text-bold">
                        <i class="bi bi-pencil-square" style="font-size: larger;"></i>
                        แก้ไข 
                    </span>
                </a> 
            </div>
        </div> 
    </div>
</article>

 