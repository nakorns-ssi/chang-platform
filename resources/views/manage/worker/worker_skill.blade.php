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
            <div class=" h5">ความสามารถ </div>
        </div>
    </header><!-- End Header -->
    <?php
    $actionPath = '/manage/worker/worker_skill_save';
    ?>
    <form action="{{ $actionPath }}" method="post" name="frm_n" id="frm_n" class="  ">
        @csrf
    <section class="container bg-white  " style="margin-top:25px;">
        <?php
                                if(!isset($model['profile_work_history'][0])){
                                    $model['profile_work_history'][0]=null;
                                }
                                if(!isset($model['profile_project'][0])){
                                    $model['profile_project'][0]=null;
                                }

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
    
   
     

   

    <div class="container text-center mt-2"> 
        <h5>ประเภทงาน</h5>
        <?php 
        $work_category = [ 
             "งานเหล็ก" ,"งานไฟฟ้า","งานประปา","งานสี","งานปูน", "งานไม้"  
        ]; 
            ?>
            
            <div class="d-flex row g-1">
                @foreach ($work_category as $key => $item)
                <?php 
                $checked = '';
                if(isset($model['work_category'])){
                    if( in_array($item ,$model['work_category']) ){
                        $checked = 'checked';
                    }
                }
                ?>
                <div class=" col-4 col-sm-3 me-1 flex-fill card   bg-primary-subtle ">
                    <label class="  " for="work_category{{$key}}">
                    <div class="     mb-1 p-3"> 
                      <input type="checkbox" id="work_category{{$key}}" 
                      name="skills[work_category][]" value="{{$item}}"
                      {{$checked}} >
                      {{$item}} 
                    </div>
                    </label>
                </div> 
                @endforeach 
            </div> 
            <div class="row g-2 mt-1">
                <div class="mb-3  text-start">
                    <label for="work_category_other" class="form-label">ประเภทงาน อื่นๆ</label>
                    <input type="text" class="form-control" id="work_category_other"
                    name="skills[work_category_other][]" value="{{$model['work_category_other'][0]}}" 
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

            <div class="d-flex row g-1">
                @foreach ($work_sub_category as $key => $item)
                <?php 
                $checked = '';
                if(isset($model['work_sub_category'])){
                    if( in_array($item ,$model['work_sub_category']) ){
                        $checked = 'checked';
                    }
                }
                ?>
                <div class=" col-4 col-sm-3 me-1 flex-fill card   bg-primary-subtle text-start">
                    <label class="  " for="work_sub_category{{$key}}">
                    <div class="  mb-1 p-3"> 
                      <input type="checkbox" id="work_sub_category{{$key}}" 
                      name="skills[work_sub_category][]" value="{{$item}}"
                      {{$checked}} >
                      <span> {{$item}} </span>
                    </div> 
                    </label> 
                </div> 
                @endforeach 
            </div> 
            <div class="row g-2 mt-1">
                <div class="mb-3 text-start ">
                    <label for="work_sub_category_other" class="form-label">ประเภทงานย่อย อื่นๆ</label>
                    <input type="text" class="form-control" id="work_sub_category_other"
                    name="skills[work_sub_category_other][]" value="{{$model['work_sub_category_other'][0]}}" 
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
            <div class="d-flex row g-1">
                @foreach ($skill as $key => $item)
                <?php 
                $checked = '';
                if(isset($model['skill'])){
                    if( in_array($item ,$model['skill']) ){
                        $checked = 'checked';
                    }
                }
                ?>
                <div class=" col-4 col-sm-3 me-1 flex-fill card   bg-primary-subtle text-start">
                    <label class="  " for="skill{{$key}}">
                    <div class="  mb-1 p-3"> 
                      <input type="checkbox" id="skill{{$key}}" 
                      name="skills[skill][]" value="{{$item}}"
                      {{$checked}} >
                      <span> {{$item}} </span>
                    </div> 
                    </label> 
                </div> 
                @endforeach 
            </div>
        
            <div class="row g-2 mt-1">
                <div class="mb-3 text-start ">
                    <label for="skill_other" class="form-label">ทักษะ อื่นๆ</label>
                    <input type="text" class="form-control" id="skill_other"
                    name="skills[skill_other][]" value="{{$model['skill_other'][0]}}" 
                     placeholder=" ระบุ">
                  </div>
            </div>
    </div>

    <div class="container text-center mt-2"> 
        <h5>สินค้า</h5>
        <?php 
        $product = [ 
            "เหล็กดัด","มุ้งลวด","ประตู" ,"รั้ว","โรงรถ","บ้านนอคดาวน์" 
        ]; 
            ?>
            <div class="d-flex row g-1">
                @foreach ($product as $key => $item)
                <?php 
                $checked = '';
                if(isset($model['product'])){
                    if( in_array($item ,$model['product']) ){
                        $checked = 'checked';
                    }
                }
                ?> 
                <div class=" col-4 col-sm-3 me-1 flex-fill card   bg-primary-subtle text-start">
                    <label class="  " for="product{{$key}}">
                    <div class="  mb-1 p-3"> 
                      <input type="checkbox" id="product{{$key}}" 
                      name="skills[product][]" value="{{$item}}"
                      {{$checked}} >
                      <span> {{$item}} </span>
                    </div> 
                    </label> 
                </div> 
                @endforeach 
            </div> 
            <div class="row g-2 mt-1">
                <div class="mb-3 text-start ">
                    <label for="product_other" class="form-label">สินค้า อื่นๆ</label>
                    <input type="text" class="form-control" id="product_other"
                    name="skills[product_other][]" value="{{$model['product_other'][0]}}" 
                     placeholder=" ระบุ">
                  </div>
            </div>
    </div> 

    <div class="mb-3 text-center">
        <button type="submit"  class="btn btn-primary"> บันทึก</button>
    </div>
    </section>
    </form>

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
