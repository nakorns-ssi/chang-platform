@extends('manage.manage_layout')
@section('title', 'จัดการงาน')
@section('description', '')
@section('keywords', '')
@section('content')
{{-- @include('manage.manage_header') --}}
     

    <div class="container"> 
      <div class="d-flex justify-content-between align-items-center pt-4">  
        <div class="     ">  
          <button class="btn btn-primary text-white btn-block rating-submit" id="btn_survey"
          type="button">ย้อนกลับ</button>
        </div>
        <div class="     "> 
          <button class="btn btn-primary text-white btn-block rating-submit" id="btn_survey"
          type="submit">บันทึก</button>
        </div>
      </div> 
    </div>
      <div class="container  " style="margin-top:25px;"  >  
        
      <?php
      $actionPath = '/survey/chang_promt_form/save';
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
                              <span>กรุณากรอกข้อมูลที่ถูกต้องเพื่อความสะดวกในการติดต่อ</span>
                          </span>

                          <div class="card-body"> 
                              <div class="rate    px-1 text-start  my-3 ">
                                 
                                  <div class="row justify-content-center align-items-center">
                                      <div class="col-md-6">
                                          <div class="mb-3">
                                              <label for="survey_name" class="form-label">ชื่อ-สกุล*</label>
                                              <input type="text" class="form-control" id="survey_name"
                                                  name="model[survey_name]" placeholder="ระบุ" required>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="mb-3">
                                              <label for="survey_phone" class="form-label">เบอร์โทรมือถือ*</label>
                                              <input type="text" class="form-control" id="survey_phone"
                                                  name="model[survey_phone]" placeholder="ระบุ" minlength="10"
                                                  maxlength="10" onkeypress="return isNumber(event)" pattern="\d+"
                                                  maxlength="10" required>
                                          </div>
                                      </div>
                                  </div>
                              </div>


                              <div class="rate   px-1 text-start  mt-3  ">
                                  <label for="search_district" class="form-label">*ระบุพื้นที่รับงาน/ปฎิบัติงาน
                                  </label>

                              </div>
                              <div class="rate   px-1 text-start  mt-3  ">

                                  <input type="text" class="form-control" id="search_province"
                                      placeholder="  ระดับ จังหวัด" />
                                  <div id="province_list" class="rate px-1 text-start  mt-3 "></div>
                              </div>
                              <div class="rate   px-1 text-start  mt-3  ">

                                  <input type="text" class="form-control" id="search_amphoe"
                                      placeholder="  ระดับ อำเภอ" />
                                  <div id="amphoe_list" class="rate px-1 text-start  mt-3 "></div>
                              </div>
                              <div class="rate   px-1 text-start  mt-3  ">
                                  <input type="text" class="form-control" id="search_district"
                                      placeholder="  ระดับ ตำบล" />
                                  <div id="district_list" class="rate px-1 text-start  mt-3 "></div>
                              </div>






                              <div id="master_area_line" class="d-none">

                              </div>
                              <div id="area_line" class="rate px-1 text-start  mt-3 ">
                              </div>

                              <div class="rate px-1 text-start  mt-3 d-none ">
                                  <button class="btn btn-sm btn-primary text-white btn-block rating-submit"
                                      id="btn_add_area" type="button" onclick="add_area()">
                                      <i class="fa-solid fa-plus"></i> พื้นที่</button>

                              </div>

                              <div class="rate   px-1 text-start  mt-3">
                                  <label for="remark" class="form-label">แนะนำเพิ่มเติม </label>
                                  <textarea class="form-control" id="remark" name="model[remark]" rows="2"></textarea>
                              </div>


                              <div class="buttons px-4 mt-4">
                                  <button class="btn btn-primary text-white btn-block rating-submit" id="btn_survey"
                                      type="submit">บันทึก</button>

                              </div>
                              <input type="hidden" name="model[lat]" id="lat" value="">
                              <input type="hidden" name="model[lng]" id="lng" value="">
                              <input type="hidden" name="model[location_id]" id="location_id" value="">
                              <input type="hidden" id="is_chk_phone" value="false">
                          </div>
                      </div>
                  </div>
              </div>

          </div>
      </form>

  
      
    </div>
    
    <style> 
    </style>
    <script></script> 
@endsection
