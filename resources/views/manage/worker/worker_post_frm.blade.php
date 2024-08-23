@extends('manage.manage_layout')
@section('title', 'จัดการงาน')
@section('description', '')
@section('keywords', '')
@section('content')
{{-- @include('manage.manage_header') --}}

  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between"> 
        <a class="btn btn-sm  btn-outline-dark" href="/manage/worker/post"  ><i class="bi bi-caret-left-fill"></i> ย้อนกลับ</a>
        <div class="  "><a class="text-dark" href="/manage/worker/post">โพสต์สำหรับช่าง </a> </div>
    </div>
  </header><!-- End Header -->
  <!-- End Header -->
 
      <section class="container  card " style="margin-top:25px;"  >   
        <ul class="nav nav-pills flex-row    justify-content-center " id="myTab" role="tablist">
            <li class="nav-item me-2" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                <i class="bi bi-file-text"></i> โพสต์
            </button>
            </li>
       
            <li class="nav-item me-2" role="presentation">
                <button class="nav-link " id="upload-tab" data-bs-toggle="tab" data-bs-target="#upload-tab-pane" type="button" role="tab" aria-controls="upload-tab-pane" aria-selected="false">
                    <i class='bi bi-file-image'></i> รูปภาพ (<?php echo count($upload); ?>) 
                </button>
              </li> 
        </ul>

          <div class="tab-content my-4" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                @include('manage.worker._post_frm')
            </div>
          
            <div class="tab-pane fade" id="upload-tab-pane" role="tabpanel" aria-labelledby="upload-tab" tabindex="0">
                @include('manage.worker._upload_frm') 
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
            $('#preloader').hide()
            load_alert() 
        }) // load page
        function do_save( ) {
            console.log('do_save')
            $('#preloader').show() 
                // count_file = myDropzone.files.length
                // console.log(myDropzone.files.length, myDropzone)
                
                // if (count_file > 0) {
                //     myDropzone.processQueue();
                // } else { 
                //     $('#preloader').show(); 
                //     frm_n.submit();
                    
                // } 
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