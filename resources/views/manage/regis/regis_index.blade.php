@extends('manage.manage_layout')
@section('title', 'จัดการงาน')
@section('description', '')
@section('keywords', '')
@section('content') 

    <section class="container  " >

        <?php
        $actionPath = '/manage/regis_update';
        ?>
 <form action="{{ $actionPath }}" method="post" name="frm_n" id="frm_n" class="  ">
    @csrf 
<input type="hidden" id="step" name="step" value="{{$step}}" />
<input type="hidden" id="step_total" name="step_total" value="{{$step_total}}" />
<input type="hidden" id="account_id" name="account_id" value="{{$account_id}}" />
        <div class="row justify-content-center">
            <div class="col-md-8  ">
                <div class="card text-center mb-5 pt-4">
                     
    
        
                        <div class="card-body">
                            @if($step==1)
                                @include('manage.regis.regis_profile')
                            @endif
                            @if($step==2)
                                @include('manage.regis.regis_skills',['model'=>$model_worker_profile])
                            @endif
                             
                        </div>
                       
                    
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-between mb-3">
            <?php 
            if($step > 1){ 
                $link_prevBtn = url('/manage/regis?step='.($step-1) ); 
            }else{
                $link_prevBtn = "#"; 
            }
            
             ?>
           
            <a href="{{$link_prevBtn}}" class="btn btn-lg  " style="width: 140px;  ">
                @if($step && $step !=1 )
                ย้อนกลับ
                @endif
            </a>
           
            @if($step<$step_total) <button type="submit" class="btn btn-lg btn-warning  " id="nextBtn"
                 
                style="width: 140px;">
                ถัดไป <i class="bi bi-caret-right-fill"></i>
                </button>
            @endif
            @if($step==$step_total) <button type="submit" class="btn btn-lg btn-warning bg-smeshipping-01" id="nextBtn"
                style="width: auto;">
                ถัดไป <i class="bi bi-caret-right-fill"></i>
                </button>
            @endif
        </div>
        
    </form>


    </section>
    <?php if (Session::has('alert')):
      $alert = Session::get('alert');
      ?>
    <input type="hidden" id="alert_status" name="alert['status']" value="<?= $alert['status'] ?>">
    <input type="hidden" id="alert_text" name="alert['text']" value="<?= $alert['text'] ?>">
    <?php endif;?>
    <style>
        input[type="checkbox"] {
            margin: 12px 10px;
            -ms-transform: scale(1.5);
            /* IE 9 */
            -webkit-transform: scale(1.5);
            /* Chrome, Safari, Opera */
            transform: scale(1.5);
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
