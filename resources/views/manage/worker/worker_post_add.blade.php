@extends('manage.manage_layout')
@section('title', 'จัดการงาน')
@section('description', '')
@section('keywords', '')
@section('content')
{{-- @include('manage.manage_header') --}}
     
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

        <a class="btn btn-sm  btn-outline-dark" href="/manage"  ><i class="bi bi-caret-left-fill"></i> ย้อนกลับ</a>
 
    </div>
  </header><!-- End Header -->
 
      <section class="container  " style="margin-top:25px;"  >  
        
      <?php
      $actionPath = '/manage/worker/post/save';
      ?> 
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 ">
            <form action="" method="post" name="frm_n" id="frm_n" class="  ">
                @csrf
           
                <div class="mb-3">
                    <label for="posts_content" class="form-label"><i class="bi bi-pencil"></i> เขียนโพสต์ * </label>
                    <textarea class="form-control" id="posts_content" name="model[posts_content]" rows="6" required ></textarea>
                    
                </div>
                <div class="mb-3">
                    <label for="price_min" class="form-label"><i class="bi bi-cash-coin"></i> ช่วงราคา</label>
                    <div class="input-group mb-1">
                        <div class="input-group-text" id="price_min">เริ่มต้น ฿</div>
                        <input type="number" name="model[price_min]" value="{{$model->price_min}}" class="form-control" placeholder="ราคาเริ่มต้น"  > 
                     </div>
                     <div class="input-group mb-1"> 
                        <div class="input-group-text" id="price_max">สิ้นสุด ฿</div>
                        <input type="number" name="model[price_max]" value="{{$model->price_max}}" class="form-control" placeholder="ราคาสิ้นสุด"  >
                     </div>
                </div>
              
            </form>
            </div>
        </div>
      

      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 ">
            <div class="mb-3">
                <label for="" class="form-label"> ข้อมูลติดต่อ</label>
                <div class="rate px-1 text-start  mt-3  ">
                    <button class="btn btn-sm btn-primary text-white btn-block rating-submit"
                        id="btn_add_area" type="button" onclick="add_area()">
                        <i class="fa-solid fa-plus"></i> พื้นที่</button>

                </div>
            </div>
         
        </div>
        <div class="col-md-8 col-lg-6 ">
            <div class="mb-3">
                <form action="{{ $actionPath }}" method="post" class="dropzone" id="my-great-dropzone" 
                style=" border: dotted #ccc 5px ; border-radius: 10px; ">
                    @csrf
                    <div class="previews"></div>
                    <input type="hidden" name="model[id]"  value="{{$model->id}}"  >
                    <input type="hidden" name="model[posts_type]"  value="{{$model->posts_type}}"  >
                </form>
            </div>
            <div class="mb-3 text-center">
                <button type="button"  onclick="do_save()" class="btn btn-primary"><i class="bi bi-send"></i> โพสต์</button>
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
                     //location.reload() 
                });

                this.on("success", function() {
                    console.log('success')
                    location.reload()
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
         var myDropzone
        $(document).ready(function() {
            // get_item_no()
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
                    Swal.fire({
                        icon: "error",
                        title: "ข้อมูลไม่ครบ",
                        text: "เลือก ใบเสร็จ/ภาพสินค้า  (รูปภาพ)",
                    });
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