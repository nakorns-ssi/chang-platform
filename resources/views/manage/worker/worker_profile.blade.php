@extends('manage.manage_layout')
@section('title', 'จัดการงาน-โปรไฟล์ช่าง')
@section('description', '')
@section('keywords', '')
@section('content')
    {{-- @include('manage.manage_header') --}}

    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <a class="btn  btn-sm btn-outline-dark" href="/manage"><i class="bi bi-caret-left-fill"></i> ย้อนกลับ</a>
           
        </div>
    </header><!-- End Header -->

    <section class="container  " style="margin-top:25px;">

        <?php
        $actionPath = '/manage/worker/worker_profile_save';
        ?>
 
        <div class="row justify-content-center">
            <div class="col-md-8  ">
                <div class="card text-center mb-5 pt-4">
                    <span class="  text-danger">
                        <h4>โปรไฟล์ช่าง</h4> 
                        <span>กรอกข้อมูลที่ถูกต้องเพื่อความสะดวกในการติดต่อ</span>
                    </span>
                    
                    <form action="{{ $actionPath }}" method="post" name="frm_n" id="frm_n" class="  ">
                        @csrf
                        <div class="card-body">
                            <?php
                                if(!isset($model['profile_work_history'][0])){
                                    $model['profile_work_history'][0]=null;
                                }
                                if(!isset($model['profile_project'][0])){
                                    $model['profile_project'][0]=null;
                                }
                                if(!isset($model['profile_ability_other'][0])){
                                    $model['profile_ability_other'][0]=null;
                                }
                                ?>
                            <div class="     px-1 text-start  my-3 "> 
                                <div class="row justify-content-center align-items-center">
                                    <label for="profile_work_history" class="h5">ประวัติการทำงาน</label>
                                    <textarea class="form-control"   name="model[profile_work_history][]" 
                                    rows="3">{{$model['profile_work_history'][0]}}</textarea>
                                </div>
                            </div>
                            <div class="     px-1 text-start  my-3 "> 
                                <div class="row justify-content-center align-items-center">
                                    <label for="profile_project" class="h5">ผลงาน</label>
                                    <textarea class="form-control"   name="model[profile_project][]" 
                                    rows="3">{{$model['profile_project'][0]}}</textarea>
                                </div>
                            </div>
                             

                            <div class="container text-center mt-2"> 
                                <h5>ความชำนาญ</h5>
                                <?php 
                                $profile_ability = [ 
                                    "งานเชื่อม","เหล็กดัด","มุ้งลวด","เหล็กดัดหน้าต่าง", "เหล็กดัดประตู" , "โครงหลังคา" , "งานโครงสร้าง" ,
                                    "โรงรถ" ,"กันสาด" ,'งานเหล็ก' ,"เฟอร์นิเจอร์" ,"บ้านน็อคดาวน์"
                                    ,"งานฝ้า" , "งานปูน" ,"งานไม้" ,
                                   "ทาสี" ,
                                    "ทาสีผนัง" ,
                                    "ต่อเติมงานฝ้า" ,
                                    "ปูกระเบื้อง" ,"อลูมิเนียม" , "สแตนเลส"
                                ]; 
                                    ?>
                                    <div class="row g-2">
                                        @foreach ($profile_ability as $key => $item)
                                        <?php 
                                        $checked = '';
                                        if(isset($model['profile_ability'])){
                                            if( in_array($item ,$model['profile_ability']) ){
                                                $checked = 'checked';
                                            }
                                        }
                                        ?>
                                        <div class=" col-4 col-sm-3 flex-fill ">
                                            <label class="w-100" for="profile_ability{{$key}}"> 
                                                <div class="card bg-primary-subtle fs-6  mb-1 p-2">
                                                    {{$item}}
                                                  <input type="checkbox" id="profile_ability{{$key}}" 
                                                  name="model[profile_ability][]" value="{{$item}}"
                                                  {{$checked}}
                                                  >
                                                </div>
                                            </label>
                                        </div> 
                                        @endforeach 
                                    </div> 
                                    <div class="row g-2">
                                        <div class="mb-3  ">
                                            <label for="profile_ability_other" class="form-label">ความชำนาญ อื่นๆ</label>
                                            <input type="text" class="form-control" id="profile_ability_other"
                                            name="model[profile_ability_other][]" value="{{$model['profile_ability_other'][0]}}" 
                                             placeholder=" ระบุ">
                                          </div>
                                    </div>
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
