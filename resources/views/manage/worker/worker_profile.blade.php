@extends('manage.manage_layout')
@section('title', 'จัดการงาน-โปรไฟล์ช่าง')
@section('description', '')
@section('keywords', '')
@section('content')
<?php
use App\helper\util;
use App\helper\helper_lang;  
?> 
    {{-- @include('manage.manage_header') --}}

    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between"> 
            <a class="btn  btn-sm btn-outline-dark" href="/manage"><i class="bi bi-caret-left-fill"></i> ย้อนกลับ</a>
            <div class=" h5">โปรไฟล์ช่าง </div>
        </div>
    </header><!-- End Header -->
 
    <section class="  ">
        <div class="container "> 
         

            <div class="row mt-2 g-2">
                <div class="col-sm-12">
                   
                        <div class=" card px-4 p-2 bg-white border rounded-4">
                            <div class="row justifu-content-start align-items-center">
                                <div class="col-10  "> 
                                    <a href="/manage/worker/worker_history">
                                    <div class="h4 text-nowrap pl-3">
                                        <i class="bi bi-pencil-square h5"></i>  ประวัติการทำงาน 
                                    </div>  
                                    </a>
                                    <div class="row justifu-content-center">
                                        @foreach ($work_history as $key => $value)
                                        <?php 
                                            $dataJson = json_encode([  
                                                '_key' => $value->posts_key ,  
                                                ]);
                                        ?>
                                            <div class=" col-sm-8 col-md-8  my-1 ">
                                                <div class="row py-2 px-3  border rounded-4 d-flex aligh-items-center justify-content-between bg-white">
                                                    <div class="col-12 py-2 justify-content-between">
                                                        
                                                            <span class="h6 my-2"> 
                                                                {{util::thai_date_short($value->start_date)}} - {{util::thai_date_short($value->end_date)}}  
                                                            </span>  
                                                    </div> 
                                                    <div class="col-12  ps-3">  
                                                        <div class="p-2 bg-light rounded-2 ">{!! nl2br($value->posts_content) !!}</div> 
                                                    </div> 
                                                </div> 
                                            </div>
                                        @endforeach
                                        
                                    </div>
                                </div> 
                            </div> 
                        </div>
                  
                </div>

                <div class="col-sm-12">
                    
                        
                        <div class=" card px-4 p-2 bg-white border rounded-4">
                            <div class="row justifu-content-start align-items-center">
                                <div class=" col-sm-12 ">
                                    <a href="/manage/worker/worker_project">
                                    <div class="h4 text-nowrap pl-3">
                                        <i class="bi bi-pencil-square h5"></i>ผลงาน 
                                    </div> 
                                </a>
                                </div>
                             
                            </div> 
                        </div> 
                </div>

                   
                <div class="col-sm-12">
                    
                        
                        <div class=" card px-4 p-2 bg-white border rounded-4">
                            <div class="row justifu-content-start align-items-center">
                                <div class=" col-sm-12 ">
                                    <a href="/manage/worker/worker_skill">
                                    <div class="h4 text-nowrap pl-3">
                                        <i class="bi bi-pencil-square h5"></i> ความสามารถ 
                                    </div> 
                                    </a>
                                </div>
                                <div class=" col-sm-6 ">
                                    <div class="h4 text-nowrap pl-3">
                                         ประเภทงาน 
                                    </div>  
                                        <div class="col-sm-12 my-2">   
                                            <div class="d-block p-2   ">
                                                @foreach ($worker_profile['work_category'] as $key => $item )  
                                                <span class="badge text-bg-warning fw-light me-1 ">#{{$item}}</span> 
                                                @endforeach
                                            </div> 
                                        </div>
                                       
                                </div> 
                                <div class=" col-sm-6 ">
                                    <div class="h4 text-nowrap pl-3">
                                         ประเภทงานย่อย 
                                    </div>  
                                        <div class="col-sm-12 my-2">   
                                            <div class="d-block p-2   ">
                                                @foreach ($worker_profile['work_sub_category'] as $key => $item )  
                                                <span class="badge text-bg-warning fw-light me-1 ">#{{$item}}</span> 
                                                @endforeach
                                            </div> 
                                        </div>
                                       
                                </div> 
                                <div class=" col-sm-6 ">
                                    <div class="h4 text-nowrap pl-3">
                                         ทักษะ 
                                    </div>  
                                        <div class="col-sm-12 my-2">   
                                            <div class="d-block p-2   ">
                                                @foreach ($worker_profile['skill'] as $key => $item )  
                                                <span class="badge text-bg-warning fw-light me-1 ">#{{$item}}</span> 
                                                @endforeach
                                            </div> 
                                        </div>
                                       
                                </div>
                                <div class=" col-sm-6 ">
                                    <div class="h4 text-nowrap pl-3">
                                         สินค้า 
                                    </div>  
                                        <div class="col-sm-12 my-2">   
                                            <div class="d-block p-2   ">
                                                @foreach ($worker_profile['product'] as $key => $item )  
                                                <span class="badge text-bg-warning fw-light me-1 ">#{{$item}}</span> 
                                                @endforeach
                                            </div> 
                                        </div>
                                       
                                </div> 
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
    .icon-menu {
        height: 32px;
        width: 32px; 
        max-height: 32px;
        min-width: 32px;
        border-radius: 50%; 
        border: solid 1px var(--bs-text-info);
        color: var(--bs-text-info);
        font-weight: bold;
    }
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
