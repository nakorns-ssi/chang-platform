@extends('manage.manage_layout')
@section('title', 'จัดการงาน')
@section('description', '')
@section('keywords', '')
@section('content')
{{-- @include('manage.manage_header') --}}
     

    <div class="container"> 
      <div class="d-flex justify-content-between align-items-center pt-4">  
        <div class="     ">   
          <a class="btn btn-primary" href="/manage" role="button">ย้อนกลับ</a>
        </div>
        <div class="     "> 
           
        </div>
      </div> 
    </div>
      <div class="container  " style="margin-top:25px;"  >  
        
      <?php
      $actionPath = '/manage/profile/save';
      ?>
      <form action="{{ $actionPath }}" method="post" name="frm_n" id="frm_n" class="  ">
          @csrf
          <div class="  ">
              <div class="row justify-content-center">
                  <div class="col-md-8  ">
                      <div class="card text-center mb-5 pt-4">
                          <span class="  text-danger">
                              <h4>ข้อมูลส่วนตัว</h4>
                             <p>
                              <img class="me-3 img-fluid " src="{{ asset('chang_prompt/img/chang_prompt_logo.svg') }}"
                              alt="{{env('APP_NAME')}} โลโก้" style="width: 7rem" >  
                            </p> 
                              <span>กรอกข้อมูลที่ถูกต้องเพื่อความสะดวกในการติดต่อ</span>
                          </span>

                          <div class="card-body">
                            <div class="rate    px-1 text-start  my-3 ">
                                 
                                <div class="row justify-content-center align-items-center">
                                    
                                </div>
                            </div>
                            <div class="rate    px-1 text-start  my-3 ">
                                 
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="profile_display_name" class="form-label">ชื่อโปรไฟล์*</label>
                                            <input type="text" class="form-control" id="profile_display_name"
                                            value="{{$model->profile_display_name}}"
                                                name="model[profile_display_name]" placeholder="ระบุ" required>
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="profile_full_name" class="form-label">ชื่อ-สกุล*</label>
                                            <input type="text" class="form-control" id="profile_full_name"
                                            value="{{$model->profile_full_name}}"
                                                name="model[profile_full_name]" placeholder="ระบุ" required>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div> 
                              <div class="rate    px-1 text-start  my-3 ">
                                 
                                  <div class="row justify-content-center align-items-center">
                                      
                                      <div class="col-md-6">
                                          <div class="mb-3">
                                              <label for="profile_phone" class="form-label">เบอร์โทรมือถือ*</label>
                                              <input type="text" class="form-control" id="profile_phone"
                                               value="{{$model->profile_phone}}"
                                                  name="model[profile_phone]" placeholder="ระบุ" minlength="10"
                                                  maxlength="10" onkeypress="return isNumber(event)" pattern="\d+"
                                                    required>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="profile_email" class="form-label">อีเมล</label>
                                            <input type="email" class="form-control" id="profile_email" 
                                            value="{{$model->profile_email}}"
                                                name="model[profile_email]" placeholder="ระบุ" >
                                        </div>
                                    </div>
                                  </div>
                              </div> 
                               

                              <div class="rate   px-1 text-start  mt-3">
                                  <label for="profile_bio" class="form-label">แนะนำเกี่ยวกับตัวเรา  </label>
                                  <textarea class="form-control" id="profile_bio" name="model[profile_bio]" rows="3"></textarea>
                              </div>


                              <div class="buttons px-4 mt-4">
                                  <button class="btn btn-primary text-white btn-block rating-submit"  
                                     onclick="do_save()" type="button">บันทึก</button>

                              </div>  
                          </div>
                      </div>
                  </div>
              </div>

          </div>
      </form>

  
      
    </div>
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
