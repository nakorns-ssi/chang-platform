<a href="{{ url('/manage') }}" class="btn btn-outline-dark bg-white px-2 mt-2   mx-1   ">
    <div class="row g-0  row-cols-3">
        <div class="col-auto ">
            <img src="{{ session('account')['profile_display_url'] }}" class="  rounded  "
                height="48" alt="โปรไฟล์" loading="lazy" /> 
        </div>
        <div class="col-auto px-2 ">
          <span class="text-dark text-truncate"> {{ session('account')['profile_display_name'] }}</span> 
            <br />
          <span class="text-dark  ">จัดการงาน</span>   
        </div>
        <div class="col-auto row align-items-center px-0"> 
           <span  ><i class="bi bi-chevron-right"></i></span> 
       </div>
    </div>
  </a> 