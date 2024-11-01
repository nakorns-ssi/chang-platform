@extends('manage.manage_layout')
@section('title', 'จัดการงาน')
@section('description', '')
@section('keywords', '')
@section('content')
    {{-- @include('manage.manage_header') --}}

    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
            <a class="btn btn-sm  btn-outline-dark" href="/manage/worker/worker_profile"><i class="bi bi-caret-left-fill"></i>
                ย้อนกลับ</a>
            <div class=" h5">ผลงาน </div>
        </div>
    </header><!-- End Header -->

    <section class="container-fluid bg-white  " style="margin-top:25px;">
        <div class="mb-2 row justify-content-between">
            <div class="col-6  text-start">
                ทั้งหมด {{ count($model) }} รายการ
            </div>
            <div class="col-6  text-end">
                <a class="btn btn-primary" href="/manage/worker/worker_project/add" role="button"><i
                        class="bi bi-plus-lg"></i>
                    เพิ่ม</a>
            </div>
        </div>

        <div class="container">
            <div class="d-flex align-content-start flex-wrap"> 
                @foreach ($model as $key => $value)
                <a href="/manage/worker/worker_project/edit?id={{$value->posts_key}}">
                    <div class="card my-2 mx-1" style="width: 180px; height: 180px; overflow: hidden;">
                        <!-- The background image -->
                        <div class="card__thumbnail">
                            <img src="{{ $value->img_thumbnail_url }}"> 
                        </div>
                        <div class="card-footer ">
                            <div class="  text-truncate" style="max-width: 150px;">
                                {{ $value->posts_title }}
                            </div> 
                          </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

        <div class="mt-2 row justify-content-center">

            <div class="col-12 pagination-custom d-flex justify-content-center">
                @if (count($model) > 0)
                    {{ $model->links() }}
                @else
                    ไม่พบรายการ
                @endif
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable modal-fullscreen ">
            <div class="modal-content">
                <div class="modal-header  " style=" background-color: var(--bs-primary);">
                    <button type="button" class="btn border border-dark " data-bs-dismiss="modal"
                        aria-label="Close">X</button>
                    <h5 class="modal-title" id="myModal_title">Modal title</h5>
                </div>
                <div class="modal-body bg-light text-center">
                    <div class="fs-4"> กำลังโหลด...</div>
                </div>
            </div>
        </div>
    </div>

    <?php if (Session::has('alert')):
      $alert = Session::get('alert');
      ?>
    <input type="hidden" id="alert_status" name="alert['status']" value="<?= $alert['status'] ?>">
    <input type="hidden" id="alert_text" name="alert['text']" value="<?= $alert['text'] ?>">
    <?php endif;?>
    <style>
        h3 {
            color: #f1f1f1;
        }

        .content {
            position: absolute;
            bottom: 0;
            background: rgb(0, 0, 0);
            /* Fallback color */
            background: rgba(0, 0, 0, 0.4);
            /* Black background with 0.4 opacity */
            color: #f1f1f1;
            width: 100%;
            padding: 15px;
            padding-top: 10px;
            padding-bottom: 0;
        }

        .card__title {
            /* Just for styling */
            align-self: flex-end;
            padding: 0.5rem;
            color: rgba(255, 255, 255, .90);
            font-size: 1rem;
            line-height: 1.1; 
            background: #433d3d8c;
            width: 100%;
        }

        /* Styles for:
    ** - Using IMG tag inside a container
    ------------------------------------------ */
        /* The image container */
        .card__thumbnail {
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: center;
            /* horizontal center */
            align-items: center;
            /* vertical center */

            width: 100%;
            /* Thumbnail dimensions. */
            height: 100%;
            /*** Change the height to make the image smaller ***/
            /* background-color: rgba(0,0,0,.2);  /* for debugging */

        }

        /* Sets the image dimensions */
        .card__thumbnail>img {
            /* Tip: use 1:1 ratio images */
            height: 100%;
            /* or width when img.width > img.height */
        }

        /* Styles the title inside the img container */
        .card__thumbnail>.card__title {
            /* Just for styling */
            position: absolute;
            left: 0;
            bottom: 0;
        }
    </style>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <script>
        var myDropzone
        Dropzone.options.myGreatDropzone = { // camelized version of the `id` 
            dictDefaultMessage: "<i class='bi bi-file-image'></i> รูปภาพ   ( ไม่เกิน 5 รูป)",
            autoProcessQueue: true,
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
                    location.reload()
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
        $(document).ready(function() {
            // get_item_no()
            load_alert()


        }) // load page

        function add_item() {
            console.log('add_item')
            var config = {
                title: 'เพิ่ม',
                url: '/manage/worker/worker_project/add'
            }
            show_modal(config)
        }

        function edit_item(data) {
            console.log('edit_item')
            console.log(data)
            var config = {
                title: 'แก้ไข',
                url: '/manage/worker/worker_project/edit' +
                    '?id=' + data._key
            }


            show_modal(config)
        }

        function del_item(data) {
            var config = {
                title: 'ลบ',
                url: '/manage/worker/worker_project/del' +
                    '?id=' + data._key
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

        }

        $("#myModal").on("hidden.bs.modal", function() {
            $("#myModal").find(".modal-body").empty()
            $("#myModal").find(".modal-body").html('<div class="fs-4"> กำลังโหลด...</div>')
        });

        function show_modal(config) {
            console.log('show_modal')
            console.log(config)

            $('#myModal_title').text(config.title);
            $("#myModal").find(".modal-body").load(config.url)
            var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
                keyboard: false
            });
            myModal.show()
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
    </script>
@endsection
