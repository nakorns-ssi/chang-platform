@extends('manage.manage_layout')
@section('title', 'จัดการ ประวัติการทำงาน')
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
            <a class="btn btn-sm  btn-outline-dark" href="/manage/worker/worker_profile"><i class="bi bi-caret-left-fill"></i>
                ย้อนกลับ</a>
            <div class=" h5">ประวัติการทำงาน </div>
        </div>
    </header><!-- End Header -->

    <section class="container  " style="margin-top:25px;">
        <div class="mb-2 row justify-content-between">
            <div class="col-6  text-start">
                ทั้งหมด {{ count($model) }} รายการ
            </div>
            <div class="col-6  text-end">
                <a class="btn btn-primary" href="#" onclick="add_item()" role="button"><i
                        class="bi bi-plus-lg"></i> เพิ่ม</a>
            </div>
        </div>
        <div class="row   justify-content-center">

            @foreach ($model as $key => $value)
            <?php 
                $dataJson = json_encode([  
                    '_key' => $value->posts_key ,  
                    ]);
            ?>
                <div class=" col-sm-8 col-md-8  my-1 ">
                    <div class="row py-2 px-3  border rounded-4 d-flex aligh-items-center justify-content-between bg-white">
                        <div class="col-12 py-2 justify-content-between">
                            <a class=''  href='#'  onclick='edit_item({{ $dataJson }})'
                              role='button'>
                                <span class="h6 my-2">
                                    <i class="bi bi-pencil-square h5"></i> 
                                    {{util::thai_date_short($value->start_date)}} - {{util::thai_date_short($value->end_date)}}  
                                </span> 
                            </a> 
                        </div> 
                        <div class="col-12  ps-3">  
                            <div class="p-2 bg-light rounded-2 ">{!! nl2br($value->posts_content) !!}</div> 
                        </div>
                        
                    </div> 
                </div>
            @endforeach

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

            $(":input").attr("autocomplete", "off");
         
        }) // load page

        function add_item() {
            console.log('add_item')
            var config = {
                title: 'เพิ่ม',
                url: '/manage/worker/worker_history/add'
            }
            show_modal(config)
        }

        function edit_item(data) {
            console.log('edit_item')
            console.log(data)
            var config = {
                title: 'แก้ไข',
                url: '/manage/worker/worker_history/edit' +
                    '?id=' + data._key
            }

            function del_item(data) {
                var config = {
                    title: 'ลบ',
                    url: '/manage/worker/worker_history/del' +
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
            show_modal(config)
        }

        $("#myModal").on("hidden.bs.modal", function () {
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
