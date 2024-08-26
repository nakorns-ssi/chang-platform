@extends('manage.manage_layout')
@section('title', 'จัดการงาน')
@section('description', '')
@section('keywords', '')
@section('content')
    {{-- @include('manage.manage_header') --}}

    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <a class="btn  btn-sm btn-outline-dark" href="/manage"><i class="bi bi-caret-left-fill"></i> ย้อนกลับ</a>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
 
        </div>
    </header><!-- End Header -->

    <section class="container  " style="margin-top:25px;">

        <?php
        $actionPath = '/manage/profile/save';
        ?>
 
        <div class="row justify-content-center">
            <div class="col-md-8  ">
                <div class="card text-center mb-5 pt-4">
                    <span class="  text-danger">
                        <h4>ข้อมูลส่วนตัว</h4> 
                        <p>
                            <img src="{{ session('account')['profile_display_url'] }}" class="  rounded  " alt="โปรไฟล์"
                                loading="lazy" style="width: 5rem;minmax(3rem, 48px);" />
                        </p>
                       
                        <div class="row justify-content-center align-items-center">
                            <div class="col-md-6">
                                @include('manage.profile._profile_upload_frm')
                            </div>
                        </div>
                        <span>กรอกข้อมูลที่ถูกต้องเพื่อความสะดวกในการติดต่อ</span>
                    </span>
                    
                    <form action="{{ $actionPath }}" method="post" name="frm_n" id="frm_n" class="  ">
                        @csrf
                        <div class="card-body">
                            <div class="rate    px-1 text-start  my-3 ">

                                <div class="row justify-content-center align-items-center">

                                </div>
                            </div>
                            <div class="rate    px-1 text-start  my-3 ">

                                <div class="row justify-content-center align-items-center">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="profile_display_name" class="form-label">ชื่อโปรไฟล์ *</label>
                                            <input type="text" class="form-control" id="profile_display_name"
                                                value="{{ $model->profile_display_name }}"
                                                name="model[profile_display_name]" placeholder="ระบุ" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="profile_full_name" class="form-label">ชื่อ-สกุล </label>
                                            <input type="text" class="form-control" id="profile_full_name"
                                                value="{{ $model->profile_full_name }}" name="model[profile_full_name]"
                                                placeholder="ระบุ" required>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="rate    px-1 text-start  my-3 ">

                                <div class="row justify-content-center align-items-center">

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="profile_phone" class="form-label">เบอร์โทรมือถือ</label>
                                            <input type="text" class="form-control" id="profile_phone"
                                                value="{{ $model->profile_phone }}" name="model[profile_phone]"
                                                placeholder="ระบุ" minlength="10" maxlength="10"
                                                onkeypress="return isNumber(event)" pattern="\d+" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="profile_email" class="form-label">อีเมล</label>
                                            <input type="email" class="form-control" id="profile_email"
                                                value="{{ $model->profile_email }}" name="model[profile_email]"
                                                placeholder="ระบุ">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="rate   px-1 text-start  mt-3">
                                <label for="profile_bio" class="form-label">แนะนำเกี่ยวกับตัวเรา </label>
                                <textarea class="form-control" id="profile_bio" name="model[profile_bio]" rows="3">{{ $model->profile_bio }}</textarea>
                            </div>


                            <div class="buttons px-4 mt-4">
                                <button class="btn btn-primary text-white btn-block rating-submit" onclick="do_save()"
                                    type="button">บันทึก</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8  "></div>
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
