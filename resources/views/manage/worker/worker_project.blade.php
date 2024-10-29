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

    <section class="container  " style="margin-top:25px;">
        <div class="mb-2 row justify-content-between">
            <div class="col-6  text-start">
                ทั้งหมด {{ count($model) }} รายการ
            </div>
            <div class="col-6  text-end">
                <a class="btn btn-primary" href="#" onclick="add_item()" role="button"><i class="bi bi-plus-lg"></i>
                    เพิ่ม</a>
            </div>
        </div>
        <div class="row gx-1 gx-lg-4 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-start">
            @foreach ($model as $key => $value)
                <div class="col-lg-4 col-md-6  my-1 ">
                    @include('layouts.section.PostCard', ['mode' => 'edit'])
                </div>
            @endforeach
        </div>

        <div class="row  justify-content-start">
            <div class=" col-sm-12 col-md-6  my-1  ">
                <div class="card position-relative  ">
                    <img class="img-fluid  " src="https://picsum.photos/seed/picsum/800/600"
                        alt="Notebook" style=" ">
                    <div class="content" style=" ">
                        <h3>Heading</h3>
                        <p>Lorem ipsum dolor sit amet, an his etiam torquatos. Tollit soleat phaedrum te duo, eum cu
                            recteque expetendis neglegentur. Cu mentitum maiestatis persequeris pro, pri ponderum tractatos
                            ei.</p>
                    </div>
                </div>
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
    </style>

    <script>
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
