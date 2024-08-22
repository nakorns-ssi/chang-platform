<?php 
 $actionPath = '/manage/worker/post/save';
?>
<div class="row justify-content-center"> 
    <div class="col-md-8 col-lg-6 ">
        <div class="mb-3">
            <form action="{{ $actionPath }}" method="post" class="dropzone" name="my_great_dropzone" id="my-great-dropzone" 
            style=" border: dotted #ccc 5px ; border-radius: 10px; ">
                @csrf
                <div class="previews"></div>
                
            </form>
        </div> 
    </div>
</div>

<div class="container d-flex justify-content-center"> 
<table class="table w-75 table-sm table-bordered"> 
    <tbody>
    @foreach ($upload as $key => $value)
    <?php $view_img_link = '/upload/img/' . $value->upload_key; ?>
      <tr> 
        <td>
            <a href='{{ $view_img_link }}' target='_blank'>
                <img src="{{ $view_img_link }}" width="150px" class="rounded" loading="lazy">
            </a>
        </td>
        <td class="align-middle"> <button type="button" class="btn btn-sm btn-danger" 
            onclick="del_upload('{{$value->upload_key}}')"
            >ลบ</button></td>
      </tr> 
      @endforeach 
    </tbody>
  </table>
</div>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />   
<script>
    Dropzone.options.myGreatDropzone = { // camelized version of the `id` 
        dictDefaultMessage: "<i class='bi bi-file-image'></i> รูปภาพ   ( ไม่เกิน 5 รูป)",
        autoProcessQueue: true,
        addRemoveLinks: true,
        paramName: 'model[pic_upload]',
        uploadMultiple: true,
        parallelUploads: 10,
        maxFiles: 5,
        resizeWidth: 640, 
        resizeQuality: 0.7,
        acceptedFiles: "image/*",
        init: function() {
            myDropzone = this;

            // First change the button to actually tell Dropzone to process the queue.
            this.on("complete", function() {
                console.log('complete')
               //  location.href = '/manage/worker/post'
               location.reload() 
            });

            this.on("success", function() {
                console.log('success')
                // location.href = '/manage/worker/post'
            });

            this.on('error', function(file, response) {
                console.log('error')
                console.log(response)

            });
            this.on("sendingmultiple", function(file, xhr, formData) {
                console.log('sendingmultiple')
                var data = $('#frm_n').serializeArray();
                $.each(data, function(key, el) {
                    formData.append(el.name, el.value);
                });
                $('#preloader').show()
            });
            this.on("successmultiple", function(files, response) {
                console.log('successmultiple')
                // location.reload() 
            });
            this.on("errormultiple", function(files, response) {
                console.log('errormultiple')
            });

        }
    };

  </script>
<script>
     function del_upload(upload_key) {
        var config = {
                title: 'ต้องการจะลบ ?',
                url: '/upload/del' 
                + '?upload_key=' + upload_key
            }
            Swal.fire({
                title: 'ต้องการจะลบ ?', 
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'ยกเลิก',
                confirmButtonText: 'ตกลง, ลบรายการ !'
            }).then((result) => {
                if (result.value) {
                    $('#preloader').show()
                    location.href = config.url
                }
            })
        
  
        }
</script>