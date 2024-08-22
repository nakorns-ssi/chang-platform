@extends('manage.manage_layout')
@section('title', 'จัดการงาน')
@section('description', '')
@section('keywords', '')
@section('content')
{{-- @include('manage.manage_header') --}}
<script type="text/javascript"
        src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
<script type="text/javascript"
    src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
<link rel="stylesheet"
    href="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css">
<script type="text/javascript"
    src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>   
 
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
                <button class="nav-link" id="location-tab" data-bs-toggle="tab" data-bs-target="#location-tab-pane" type="button" role="tab" aria-controls="location-tab-pane" aria-selected="false">
                    <i class="bi bi-geo-alt-fill"></i> พื้นที่
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
            <div class="tab-pane fade" id="location-tab-pane" role="tabpanel" aria-labelledby="location-tab" tabindex="0"> 
                @include('manage.worker._location_frm')    
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
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />   
    <script>
        Dropzone.options.myGreatDropzone = { // camelized version of the `id`
            autoProcessQueue: false,
            dictDefaultMessage: "<i class='bi bi-file-image'></i> รูปภาพ   ( ไม่เกิน 5 รูป)",
            autoProcessQueue: false,
            addRemoveLinks: true,
            paramName: 'model[pic_upload]',
            uploadMultiple: true,
            parallelUploads: 10,
            maxFiles: 5,
            resizeWidth: 640, 
            resizeQuality: 0.7,
            acceptedFiles: "image/*",
            init: function() {
                myDropzone = this;

                // First change the button to actually tell Dropzone to process the queue.
                this.on("complete", function() {
                    console.log('complete')
                   //  location.href = '/manage/worker/post'
                });

                this.on("success", function() {
                    console.log('success')
                     location.href = '/manage/worker/post'
                });

                this.on('error', function(file, response) {
                    console.log('error')
                    console.log(response)

                });
                this.on("sendingmultiple", function(file, xhr, formData) {
                    console.log('sendingmultiple')
                    var data = $('#frm_n').serializeArray();
                    $.each(data, function(key, el) {
                        formData.append(el.name, el.value);
                    });
                    $('#preloader').show()
                });
                this.on("successmultiple", function(files, response) {
                    console.log('successmultiple')
                    // location.reload() 
                });
                this.on("errormultiple", function(files, response) {
                    console.log('errormultiple')
                });

            }
        };

      </script>
    <script>
 let district_list = document.getElementById("district_list");
 $.Thailand({
            $district: $('.district'), // input ของตำบล
            //  $amphoe: $('.amphoe'), // input ของอำเภอ
            //  $province: $('.province'), // input ของจังหวัด
            //  $zipcode: $('#postcode'), // input ของรหัสไปรษณีย์
            $search: $('#search_district'),
            onDataFill: function(data) {
                console.log(data)
                district_list.innerHTML =
                    " <div><span class='badge fs-6 my-1 text-bg-secondary'>" + data.district + "</span>" +
                    ` <span class="options ms-auto"> 
                       <i onClick="deleteItem(this)" class="fas fa-trash-alt text-danger"></i>
                       <input type="hidden" name="working_area[district][]" value='${JSON.stringify(data)}'>
                   </span></div >`
            }
});
         var myDropzone
         $('#preloader').show()
         let deleteItem = (e) => {
            console.log(e)
            e.parentElement.parentElement.remove();
            // e.parentElement.remove();
            console.log(e)
        };
        $(document).ready(function() {
            // get_item_no()
            $('#preloader').hide()
            load_alert() 
        }) // load page
        function do_save( ) {
            console.log('do_save')
            $('#preloader').show() 
                count_file = myDropzone.files.length
                console.log(myDropzone.files.length, myDropzone)
                
                if (count_file > 0) {
                    myDropzone.processQueue();
                } else { 
                    $('#preloader').show(); 
                    frm_n.submit();
                    
                } 
           // frm_n.submit()
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