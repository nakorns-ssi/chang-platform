@extends('manage.manage_layout')
@section('title', 'จัดการงาน-โปรไฟล์ช่าง')
@section('description', '')
@section('keywords', '')
@section('content')
    {{-- @include('manage.manage_header') --}}

    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <a class="btn  btn-sm btn-outline-dark" href="/manage"><i class="bi bi-caret-left-fill"></i> ย้อนกลับ</a>
           
        </div>
    </header><!-- End Header -->
 
    <section class="  ">
        <div class="container "> 
            <div class="row  bg-white border rounded-4">
                <div class="col-12 border-bottom sticky-top  ">
                    <div class=" mb-0     shadow">  
                            <div class="row g-0 mx-2 my-3 row-cols-3">
                                <div class="col-4 ">
                                    <img src="{{ session('account')['profile_display_url'] }}" class="  img-fluid rounded-circle mb-2  "
                                    width="64" height="64" alt="โปรไฟล์" loading="lazy" /> 
                                </div>
                                <div class="col-4 px-2 ">
                                  <span class="text-dark text-truncate"> {{ session('account')['profile_display_name'] }}</span> 
                                    <br />
                                  <span class="text-dark  ">{{ session('account')['display_name'] }}</span>   
                                </div>
                                <div class="col-4 row align-items-center px-0"> 
                                   <span  ><i class="bi bi-chevron-right"></i></span> 
                               </div>
                            </div>  
                    </div>
                </div> 

                <div class="col-sm-6 col-xl-4  "> 
                    <div class="row g-0 my-2 ">
                        <div class="col-4"> 
                            <div class="fw-bold mx-1"> 00 </div>  
                            <p><small>คะแนน</small></p> 
                        </div>
                        <div class="col-4"> 
                            <div class="fw-bold mx-1"> 00 </div>  
                            <p><small>คะแนน</small></p> 
                        </div>
                        <div class="col-4"> 
                            <div class="fw-bold mx-1"> 00 </div>  
                            <p><small>คะแนน</small></p> 
                        </div> 
                    </div> 
                </div> 
                <div class="col-sm-6 col-xl-8">
 
                </div> 
                <div class="col-12 border-top"> 
                    <div class="row g-0 mx-2 my-3 row-cols-3">
                        <div class="col-4 ">
                            <img src="{{ session('account')['profile_display_url'] }}" class="  img-fluid rounded-circle mb-2  "
                            width="64" height="64" alt="โปรไฟล์" loading="lazy" /> 
                        </div>
                        <div class="col-4 px-2 ">
                            <span class="text-dark text-truncate"> {{ session('account')['profile_display_name'] }}</span> 
                            <br />
                            <span class="text-dark  ">{{ session('account')['display_name'] }}</span>   
                        </div>
                        <div class="col-4 row align-items-center px-0"> 
                            <span  ><i class="bi bi-chevron-right"></i></span> 
                        </div>
                    </div>   
                </div> 
            </div>

            <div class="row mt-2 g-2">
                <div class="col-sm-6">
                    <a href="#">
                        <div class=" card px-4 p-2 bg-white border rounded-4">
                            <div class="row justifu-content-start align-items-center">
                                <div class="col-10  ">
                                    <h4>ผลงาน</h4>
                                    <div class="row justifu-content-between">
                                        <div class="col-5 col-sm-4 "><i class="bi bi-star-fill text-warning"></i> 4.85/5 </div>
                                        <div class="col-5 col-sm-4">1853 skills</div> 
                                    </div>
                                </div>
                                <div class="col-2 col-sm-2 float-end"> 
                                    <span  ><i class="bi bi-chevron-right"></i></span> 
                                </div>
                            </div> 
                        </div>
                    </a> 
                </div>

                <div class="col-sm-6">
                    <a href="#">
                        <div class=" card px-4 p-2 bg-white border rounded-4">
                            <div class="row justifu-content-start align-items-center">
                                <div class="col-10  ">
                                    <h4>ประวัติการทำงาน</h4>
                                    <div class="row justifu-content-between">
                                        <div class="col-5 col-sm-4 "><i class="bi bi-star-fill text-warning"></i> 4.85/5 </div>
                                        <div class="col-5 col-sm-4">1853 skills</div> 
                                    </div>
                                </div>
                                <div class="col-2 col-sm-2 float-end"> 
                                    <span  ><i class="bi bi-chevron-right"></i></span> 
                                </div>
                            </div> 
                        </div>
                    </a> 
                </div>

            

                <div class="col-sm-6">
                    <div class=" card px-4 p-2 bg-white border rounded-4">
                        <div class="row justifu-content-start">
                            <div class="col-12  ">
                                <h4>ประวัติการทำงาน</h4>
                            </div>
                            <div class="col-6 col-sm-4 "><i class="bi bi-star-fill text-warning"></i> 4.85/5 </div>
                            <div class="col-6 col-sm-4">1853 skills</div>
                        </div>
                       
                    </div>
                </div>
                
            </div>

            <div class="row mt-2 bg-white border rounded-4">
                <div class="card text-center">
                    <div class="card-header">
                      <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="true" href="#">ประวัติการทำงาน</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link "  href="#">ผลงาน</a>
                        </li>  
                      </ul>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">Special title treatment</h5>
                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
        </div>

        </div>
    </section>


    <?php if (Session::has('alert')):
      $alert = Session::get('alert');
      ?>
    <input type="hidden" id="alert_status" name="alert['status']" value="<?= $alert['status'] ?>">
    <input type="hidden" id="alert_text" name="alert['text']" value="<?= $alert['text'] ?>">
    <?php endif;?>
    <style>
         
    </style>
    <script>
        $(document).ready(function() {
            // get_item_no()
            load_alert()

        }) // load page
        function do_save() {
            console.log('do_save')
            $('#preloader').show()
            frm_n.submit()
        }


        function load_alert() {
            if (!$('#alert_status').val()) return
            let status = $('#alert_status').val()
            let text = $('#alert_text').val()
            if ($('#alert_status').val() == 'success') {
                toastr.success(text);
            } else {
                toastr.error(text);
            }
        }

        function isNumber(evt) {
            var charCode = evt.which ? evt.which : evt.keyCode;
            if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
    </script>
@endsection
