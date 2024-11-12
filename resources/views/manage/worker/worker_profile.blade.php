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
    <article    style="padding-top: 60px;padding-bottom: 60px;" > 

        @include('layouts.section.WorkProfile_view', 
        ['account_id' => $account_id, 'mode' => 'edit'])

    </article>

 




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
