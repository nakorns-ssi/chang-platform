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
        <ul class="nav nav-pills d-flex  " id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">โพสต์</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">พื้นที่</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">รูปภาพ</button>
            </li>
          
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">โพสต์</div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">พื้นที่</div>
            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">รูปภาพ
            @include('manage.worker.worker_upload_frm')    
            </div> 
          </div>
      <?php
      $actionPath = '/manage/worker/post/save';
      ?> 
       <form action="{{ $actionPath }}" method="post" name="frm_n" id="frm_n" class="  ">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 ">
            
                <div class="mb-3">
                    <label for="posts_content" class="form-label"><i class="bi bi-pencil"></i> เขียนโพสต์ * </label>
                    <textarea class="form-control" id="posts_content" name="model[posts_content]" rows="6" required >{{$model->posts_content}}</textarea>
                    
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
                <div class="mb-3">
                    <label for="search_district" class="form-label"><i class="bi bi-geo-alt-fill"></i> ระบุพื้นที่รับงาน/ปฎิบัติงาน
                    </label>
                      <input type="text" class="form-control" id="search_district"
                            placeholder=" ระบุเช่น ชุมพร , หลังสวน , หาดใหญ่" />
                        <div id="district_list" class="  px-1 text-start  mt-3 "></div>
                        @if($model->location_district)
                            <div>
                            <span class='badge fs-6 my-1  text-bg-secondary'>{{$model->location_district}}</span> 
                            <span class="options ms-auto"> 
                                <i onClick="deleteItem(this)" class="fas fa-trash-alt text-danger"></i>
                                <input type="hidden" name="working_area[district][]" value={{$model->location_district}}>
                            </span>
                            </div >
                        @endif
                </div>
               
            </div>
        </div> 
        <input type="hidden" name="model[id]"  value="{{$model->id}}"  >
         <input type="hidden" name="model[posts_type]"  value="{{$model->posts_type}}"  >
    </form>
       
       
      <div class="row justify-content-center"> 
        <div class="col-md-8 col-lg-6 ">
            <div class="mb-3">
                <form action="{{ $actionPath }}" method="post" class="dropzone" name="my_great_dropzone" id="my-great-dropzone" 
                style=" border: dotted #ccc 5px ; border-radius: 10px; ">
                    @csrf
                    <div class="previews"></div>
                    
                </form>
            </div>
            <div class="mb-3 text-center">
                <button type="button"  onclick="do_save()" class="btn btn-primary"><i class="bi bi-send"></i> โพสต์</button>
            </div>
        </div>
    </div>

    <div class="container d-flex justify-content-center"> 
    <table class="table w-75 table-sm table-bordered"> 
        <tbody>
        @foreach ($upload as $key => $value)
        <?php $view_img_link = '/upload/img/' . $value->upload_key; ?>
          <tr> 
            <td>
                <a href='{{ $view_img_link }}' target='_blank'>
                    <img src="{{ $view_img_link }}" width="150px" class="rounded" loading="lazy">
                </a>
            </td>
            <td class="align-middle"> <button type="button" class="btn btn-sm btn-danger" 
                onclick="del_img('{{$value->upload_key}}')"
                >ลบ</button></td>
          </tr> 
          @endforeach 
        </tbody>
      </table>
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

        function del_img(data) {
            var config = {
                title: 'ลบ-สินค้า/บริการ',
                url: '/claim/product/del' 
                + '?id=' + data.id 
            }
            Swal.fire({
                title: 'Are you sure?',
                text: data.title,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    location.href = config.url
                }
            })
        
 
        show_modal(config)
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