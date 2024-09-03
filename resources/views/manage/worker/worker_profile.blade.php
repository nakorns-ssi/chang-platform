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

                                if(!isset($model['work_category'][0])){
                                    $model['work_category'][0]=null;
                                }
                                if(!isset($model['work_category_other'][0])){
                                    $model['work_category_other'][0]=null;
                                }

                                if(!isset($model['work_sub_category'][0])){
                                    $model['work_sub_category'][0]=null;
                                }
                                if(!isset($model['work_sub_category_other'][0])){
                                    $model['work_sub_category_other'][0]=null;
                                }
                                if(!isset($model['skill'][0])){
                                    $model['skill'][0]=null;
                                }
                                if(!isset($model['skill_other'][0])){
                                    $model['skill_other'][0]=null;
                                }
                                if(!isset($model['product'][0])){
                                    $model['product'][0]=null;
                                }
                                if(!isset($model['product_other'][0])){
                                    $model['product_other'][0]=null;
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
                                <h5>ประเภทงาน</h5>
                                <?php 
                                $work_category = [ 
                                     "งานเหล็ก" ,"งานไฟฟ้า","งานประปา","งานสี","งานปูน", "งานไม้"  
                                ]; 
                                    ?>
                                    <div class="row g-2">
                                        @foreach ($work_category as $key => $item)
                                        <?php 
                                        $checked = '';
                                        if(isset($model['work_category'])){
                                            if( in_array($item ,$model['work_category']) ){
                                                $checked = 'checked';
                                            }
                                        }
                                        ?>
                                        <div class=" col-4 col-sm-3 flex-fill ">
                                            <label class="w-100" for="work_category{{$key}}"> 
                                                <div class="card bg-primary-subtle fs-6  mb-1 p-2">
                                                    {{$item}}
                                                  <input type="checkbox" id="work_category{{$key}}" 
                                                  name="model[work_category][]" value="{{$item}}"
                                                  {{$checked}}
                                                  >
                                                </div>
                                            </label>
                                        </div> 
                                        @endforeach 
                                    </div> 
                                    <div class="row g-2">
                                        <div class="mb-3  text-start">
                                            <label for="work_category_other" class="form-label">ประเภทงาน อื่นๆ</label>
                                            <input type="text" class="form-control" id="work_category_other"
                                            name="model[work_category_other][]" value="{{$model['work_category_other'][0]}}" 
                                             placeholder=" ระบุ">
                                          </div>
                                    </div>
                            </div>

                            <div class="container text-center mt-2"> 
                                <h5>ประเภทงานย่อย</h5>
                                <?php 
                                $work_sub_category = [ 
                                    "งานบำรุงรักษา","งานซ่อมแซม","งานติดตั้ง","งานผลิต" 
                                ]; 
                                    ?>
                                    <div class="row g-2">
                                        @foreach ($work_sub_category as $key => $item)
                                        <?php 
                                        $checked = '';
                                        if(isset($model['work_sub_category'])){
                                            if( in_array($item ,$model['work_sub_category']) ){
                                                $checked = 'checked';
                                            }
                                        }
                                        ?>
                                        <div class=" col-4 col-sm-3 flex-fill ">
                                            <label class="w-100" for="work_sub_category{{$key}}"> 
                                                <div class="card bg-primary-subtle fs-6  mb-1 p-2">
                                                    {{$item}}
                                                  <input type="checkbox" id="work_sub_category{{$key}}" 
                                                  name="model[work_sub_category][]" value="{{$item}}"
                                                  {{$checked}}
                                                  >
                                                </div>
                                            </label>
                                        </div> 
                                        @endforeach 
                                    </div> 
                                    <div class="row g-2">
                                        <div class="mb-3 text-start ">
                                            <label for="work_sub_category_other" class="form-label">ประเภทงานย่อย อื่นๆ</label>
                                            <input type="text" class="form-control" id="work_sub_category_other"
                                            name="model[work_sub_category_other][]" value="{{$model['work_sub_category_other'][0]}}" 
                                             placeholder=" ระบุ">
                                          </div>
                                    </div>
                            </div>

                            <div class="container text-center mt-2"> 
                                <h5>ทักษะ</h5>
                                <?php 
                                $skill = [ 
                                    "เชื่อมฟลักซ์คอร์","เชื่อมแก๊ส","เชื่อมทิก" ,"เชื่อมแม๊ก","เชื่อมอาร์กโลหะด้วยมือ"
                                    ,"ประกอบโครงสร้างเหล็ก" ,"ตัดเหล็กกล้าคาร์บอนด้วยแก๊ส" ,"กลึง"
                                ]; 
                                    ?>
                                    <div class="row g-2">
                                        @foreach ($skill as $key => $item)
                                        <?php 
                                        $checked = '';
                                        if(isset($model['skill'])){
                                            if( in_array($item ,$model['skill']) ){
                                                $checked = 'checked';
                                            }
                                        }
                                        ?>
                                        <div class=" col-4 col-sm-3 flex-fill ">
                                            <label class="w-100" for="skill{{$key}}"> 
                                                <div class="card bg-primary-subtle fs-6  mb-1 p-2">
                                                    {{$item}}
                                                  <input type="checkbox" id="skill{{$key}}" 
                                                  name="model[skill][]" value="{{$item}}"
                                                  {{$checked}}
                                                  >
                                                </div>
                                            </label>
                                        </div> 
                                        @endforeach 
                                    </div> 
                                    <div class="row g-2">
                                        <div class="mb-3 text-start ">
                                            <label for="skill_other" class="form-label">ทักษะ อื่นๆ</label>
                                            <input type="text" class="form-control" id="skill_other"
                                            name="model[skill_other][]" value="{{$model['skill_other'][0]}}" 
                                             placeholder=" ระบุ">
                                          </div>
                                    </div>
                            </div>

                            <div class="container text-center mt-2"> 
                                <h5>สินค้า</h5>
                                <?php 
                                $product = [ 
                                    "เหล็กดัด","มุ้งลวด","ประตู" ,"รั่ว","โรงรถ","บ้านนอคดาวน์" 
                                ]; 
                                    ?>
                                    <div class="row g-2">
                                        @foreach ($product as $key => $item)
                                        <?php 
                                        $checked = '';
                                        if(isset($model['product'])){
                                            if( in_array($item ,$model['product']) ){
                                                $checked = 'checked';
                                            }
                                        }
                                        ?>
                                        <div class=" col-4 col-sm-3 flex-fill ">
                                            <label class="w-100" for="product{{$key}}"> 
                                                <div class="card bg-primary-subtle fs-6  mb-1 p-2">
                                                    {{$item}}
                                                  <input type="checkbox" id="product{{$key}}" 
                                                  name="model[product][]" value="{{$item}}"
                                                  {{$checked}}
                                                  >
                                                </div>
                                            </label>
                                        </div> 
                                        @endforeach 
                                    </div> 
                                    <div class="row g-2">
                                        <div class="mb-3 text-start ">
                                            <label for="product_other" class="form-label">สินค้า อื่นๆ</label>
                                            <input type="text" class="form-control" id="product_other"
                                            name="model[product_other][]" value="{{$model['product_other'][0]}}" 
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
