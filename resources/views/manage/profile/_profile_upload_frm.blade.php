<?php 
 $actionPath = '/manage/user_profile/user_profile_upload_img';
?>
 
    <div class="mb-3 px-4">
        <form action="{{ $actionPath }}" method="post" class="dropzone" name="my_great_dropzone" id="my-great-dropzone" 
            style=" border: dotted #ccc 5px ; border-radius: 10px; ">
            @csrf
            <div class="previews"></div> 
        </form>
    </div> 
  
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />   
<script>
    var myDropzone
    Dropzone.options.myGreatDropzone = { // camelized version of the `id` 
        dictDefaultMessage: "<i class='bi bi-file-image'></i> แก้ไขรูปภาพโปรไฟล์ ",
        autoProcessQueue: true,
        addRemoveLinks: true,
        paramName: 'model[pic_upload]',
        uploadMultiple: false, 
        maxFiles: 1,
        resizeWidth: 150, 
        resizeQuality: 0.6,
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
                location.reload() 
            });

            this.on('error', function(file, response) {
                console.log('error')
                console.log(response)

            });
            

        }
    };

  </script>
<script>
     
</script>