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
            <div class=" h5">นิติบุคคล </div>
        </div>
    </header><!-- End Header -->
    <article    style="padding-top: 80px;padding-bottom: 60px;" > 
        <div class="container">
            <?php
            $actionPath = '/manage/project_owner/company_profile/save';
            ?>
            <form action="{{ $actionPath }}" method="post" name="frm_n" id="frm_n" class="  ">
                @csrf
            <div class="row justify-content-start align-items-center">
                <div class="col-sm-6 col-md-4"> 
                    <div class=" mb-3">
                        <label for="company_name" class="form-label">Tax ID *</label>
                        <div class="input-group">
                            <input type="text" class="form-control" 
                            id="company_tax_id" value="{{ $model->company_tax_id }}" name="model[company_tax_id]"
                             placeholder="ระบุ" required > 
                            <button type="button" class="input-group-text btn d-none " 
                             style="background: var(--bs-primary);" ><i class="bi bi-search"></i></button>
                        </div> 
                      </div>
                </div>
            </div>
            <div class="row justify-content-start align-items-center">
                <div class="col-sm-8 ">
                    <div class="mb-3">
                        <label for="company_name" class="form-label">ชื่อบริษัท *</label>
                        <input type="text" class="form-control" id="company_name"
                            value="{{ $model->company_name }}"
                            name="model[company_name]" placeholder="ระบุ" required>
                    </div>
                </div>
                <div class="col-sm-8 ">
                    <div class="mb-3">
                        <label for="company_address1" class="form-label">ที่อยู่ </label>
                        <input type="text" class="form-control" id="company_address1"
                            value="{{ $model->company_address1 }}" name="model[company_address1]"
                            placeholder="ระบุ" required>
                    </div>
                </div>
                 
                
                <div class="col-sm-8 ">
                    <div class="mb-3">
                        <label for="company_remark" class="form-label">Website / อื่นๆ  </label> 
                            <textarea class="form-control" id="company_remark" name="model[company_remark]" 
                            rows="6" required >{{$model->company_remark}}</textarea>
                    
                    </div>
                </div>
    
            </div>
            <div class="text-center px-4 mt-4">
                <button class="btn btn-primary text-white btn-block  " onclick="do_save()"
                    type="button">บันทึก</button>

            </div>
            </form>
        </div>
       
     

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
