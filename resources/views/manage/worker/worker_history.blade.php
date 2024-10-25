@extends('manage.manage_layout')
@section('title', 'จัดการ ประวัติการทำงาน')
@section('description', '')
@section('keywords', '')
@section('content')
{{-- @include('manage.manage_header') --}}
     
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between"> 
        <a class="btn btn-sm  btn-outline-dark" href="/manage/worker/worker_profile"  ><i class="bi bi-caret-left-fill"></i> ย้อนกลับ</a>
        <div class=" h5">ประวัติการทำงาน </div>
    </div>
  </header><!-- End Header -->
 
      <section class="container  " style="margin-top:25px;"  >  
        <div class="mb-2 row justify-content-between">
            <div class="col-6  text-start">
                ทั้งหมด {{ count($model) }} รายการ
            </div>
            <div class="col-6  text-end">
                <a class="btn btn-sm btn-primary" href="#" role="button"><i class="bi bi-plus-lg"></i>เพิ่ม</a>
            </div>
        </div>
        <div class="row gx-1 gx-lg-4 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-start">
           
            @foreach ($model as $key => $value)
            <div class="col-lg-4 col-md-6  my-1 "> 
                
            </div>  
            @endforeach
           
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
         
        $(document).ready(function() {
            // get_item_no()
            load_alert() 
 

        }) // load page
        
        function add_item() { 
      console.log('add_item') 
      var config = {
          title: 'เพิ่ม' ,
          url: '/loan_app/loan/add' + '?customer_key=' + $('#customer_key').val() 
      } 
      show_modal(config)
}

function edit_item(data) {
  console.log('edit_item')
  console.log(data)
  var config = {
      title: 'แก้ไข'  ,
      url: '/loan_app/loan/edit' 
      + '?id=' +data._key 
  }
  function del_item(data) {
            var config = {
                title: 'ลบ',
                url: '/loan_app/loan/del' 
                + '?id=' + data._key 
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
