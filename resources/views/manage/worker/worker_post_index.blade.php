@extends('manage.manage_layout')
@section('title', 'จัดการงาน')
@section('description', '')
@section('keywords', '')
@section('content')
{{-- @include('manage.manage_header') --}}
     
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between"> 
        <a class="btn btn-sm  btn-outline-dark" href="/manage"  ><i class="bi bi-caret-left-fill"></i> ย้อนกลับ</a>
        <div class="  "><a class="text-dark" href="/manage/worker/post">โพสต์ทั้งหมด{{$page_title}} </a> </div>
    </div>
  </header><!-- End Header -->
 
      <section class="container  " style="margin-top:25px;"  >  
        <div class="mb-2 row justify-content-between">
            <div class="col-3  text-start">
                ทั้งหมด {{ count($model) }} รายการ
            </div>
            <div class="col-3  text-end">
                <a class="btn btn-sm btn-primary" href="/manage/worker/post/add" role="button"><i class="bi bi-plus-lg"></i>เพิ่ม</a>
            </div>
        </div>
            <div class="  mb-0 my-1">

                <div class="  p-0  " style="  ">
                    <?php
                    use App\helper\helper_lang;
                    ?>
                    @foreach ($model as $key => $value)
                        <div class="card mb-0 my-1 p-3">
                            <div class="d-flex align-items-start ">
                                <div class="flex-grow-1">
                                    <span
                                        class="float-end text-success text-bold">+{{ $value->point_total && $value->status_code == 'approved' ? $value->point_total : 0 }}
                                    </span>
                                    <?php
                                    $text_class = '';
                                    if ($value->status_code == 'wait') {
                                        $text_class = 'bg-warning';
                                    }
                                    if ($value->status_code == 'approved') {
                                        $text_class = 'bg-success';
                                    }
                                    
                                    ?>
                                    <span
                                        class="badge rounded-pill text-white fw-normal p-2 {{ $text_class }} ">{{ helper_lang::ssi_reward_status($value->status_code) }}</span>
                                    <br />
                                    <span class="float-end  ">
                                        <a class="btn  btn-sm btn-primary" href="admin_upload_manage?id={{ $value->id }}"
                                            role="button">จัดการข้อมูล</a>
                                    </span>


                                    <div class="d-flex mt-2 justify-content-between align-items-center">
                                        <small class="text-muted">รหัสร้านค้า.{{ $value->customer_code }}</small>
                                        <span>

                                        </span>
                                    </div>
                                    <div class="d-flex mt-2 justify-content-between align-items-center">
                                        <span>
                                            <small class="text-muted">{{ ($value->lead)?$value->lead:'' }}</small>
                                            <br/>
                                            {{ date('d/m/Y H:i', strtotime($value->created_at)) }}
                                        </span>
                                        <span class="text-end">
                                            <span>

                                            </span>
                                            <small class="text-muted">
                                                <br />
                                                <i class="bi bi-person-fill"></i>{{ $value->buyer_name }} </small>
                                            </br>
                                            <small class="text-muted">เลขที่แจ้ง.{{ $value->pickup_key }}</small>
                                        </span>
                                    </div>

                                </div>
                            </div>


                        </div>

                        
                    @endforeach
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
    <?php if (Session::has('alert')):
      $alert = Session::get('alert');
      ?>
    <input type="hidden" id="alert_status" name="alert['status']" value="<?= $alert['status'] ?>">
    <input type="hidden" id="alert_text" name="alert['text']" value="<?= $alert['text'] ?>">
    <?php endif;?>
    <style> 
    </style>
      
    <script>
         var myDropzone
        $(document).ready(function() {
            // get_item_no()
            load_alert() 

            

        }) // load page
        
 
 
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
