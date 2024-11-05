@extends('manage.manage_layout')
@section('title', 'จัดการผลงาน')
@section('description', '')
@section('keywords', '')
@section('content')

    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
            <a class="btn btn-sm  btn-outline-dark" href="/manage/worker/worker_project"><i class="bi bi-caret-left-fill"></i>
                ย้อนกลับ</a>
            <div class=" h5">ผลงาน </div>
        </div>
    </header><!-- End Header -->
    <section class="container  card " style="margin-top:25px;">
        <?php
        $actionPath = '/manage/worker/worker_project_save';
        ?>
        <form action="{{ $actionPath }}" method="post" name="frm_n" id="frm_n" class="  ">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 ">
                    <div class="mb-3  ">
                        <label for="start_date" class="form-label fs-6 fw-semibold"><i class="bi bi-calendar"></i>
                            ชื่อผลงาน *</label>
                        <input type="text" id="posts_title" name="model[posts_title]" placeholder="ผลงาน"
                            value="{{ $model->posts_title }}" class="form-control" required >
                    </div>



                    <div class="mb-3 text-center">
                        <button type="button" onclick="save_btn()" class="btn btn-primary"> บันทึก</button>
                    </div>
                </div>
            </div>
            <input type="hidden" id="id" name="model[id]" value="{{ $model->id }}">
        </form>

        <div class="mb-3 ">
            <?php $actionPath = '/manage/worker/worker_project_save'; ?>
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 ">
                    <div class="mb-3">
                        <form action="{{ $actionPath }}" method="post" class="dropzone" name="my_great_dropzone"
                            id="my-great-dropzone" style=" border: dotted #ccc 5px ; border-radius: 10px; ">
                            @csrf
                            <div class="previews"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container d-flex justify-content-center">
            <div class="mb-2 row justify-content-center">
                <div class="col-12 my-2  text-start">
                    ทั้งหมด {{ count($upload) }} รายการ
                </div>
                <div class="col-sm-10">
                    <table class="table   table-sm table-bordered">
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
                                            onclick="del_upload('{{ $value->upload_key }}')">ลบ</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> 
        </div>
        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
        <script>
            var myDropzone
            Dropzone.options.myGreatDropzone = { // camelized version of the `id` 
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
                          location.href = '/manage/worker/worker_project'
                        // location.reload() 
                    });

                    this.on("success", function() {
                        console.log('success')
                        // location.href = '/manage/worker/post'
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
            function save_btn() {
                console.log('save_btn')
                myDropzone.processQueue();
            }

            function del_upload(upload_key) {
                var config = {
                    title: 'ต้องการจะลบ ?',
                    url: '/upload/del' +
                        '?upload_key=' + upload_key
                }
                Swal.fire({
                    title: 'ต้องการจะลบ ?',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'ยกเลิก',
                    confirmButtonText: 'ตกลง, ลบรายการ !'
                }).then((result) => {
                    if (result.value) {
                        $('#preloader').show()
                        location.href = config.url
                    }
                })


            }
        </script>
    </section>

    <style>
    </style>
    <script>
        $(document).ready(function() {
            console.log('his load ready')
            //$('#ui-datepicker-div').css('clip', 'auto');
            $("#start_date").datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
                onSelect: function(dateText) {
                    sD = new Date(dateText);
                    console.log('start date :' + dateText)
                    $("input#end_date").datepicker('option', 'minDate', sD);
                }
            })
            $("#end_date").datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true
            })

        })
    </script>

@endsection
