<?php 

   $profile_display_name = session('account')['profile_display_name'] ;
   $display_name =session('account')['display_name'] ;
    $profile_display_url = session('account')['profile_display_url'] ;
    $account_code = session('account')['account_code'] ;
        
?>
<article class="bg-white d-flex align-items-center pt-4  my-2">
    <div class="container   aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        <div class="d-flex justify-content-center align-items-center py-2"> 
                <a href="/manage/user_profile"> 
                    <div class="col-12 text-center position-relative py-4">
                        <div class="c-avatar d-block position-absolute top-50 start-50 translate-middle"
                        style="  height: 80px;  width: 80px; ">
                            <img src="{{ $profile_display_url }}" class="c-avatar" alt="{{ $profile_display_name }} โปรไฟล์"
                                loading="lazy"  /> 
                        </div>
                    </div> 
                    
                    <div class="col-12 text-center text-success  my-3 py-2 ">  
                        <p>
                            <span class="text-center text-success text-bold">{{ session('account')['profile_display_name'] }} </span>
                        </p> 
                        <div class="h6 fst-normal">{{ 'No. '.str_pad(session('account')['account_id'],4,"0",STR_PAD_LEFT) }}</div>
                        <p>
                        <i class="bi bi-pencil-square" style=" "></i>
                        แก้ไขข้อมูลส่วนตัว    
                        </p> 
                    </div>
                </a>  
        </div> 
    </div>
</article>

 