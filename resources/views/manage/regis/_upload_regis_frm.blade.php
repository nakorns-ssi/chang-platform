<?php 
 
?> 
    <div id="dropzone">
      <div><i class='bi bi-file-image'></i> รูปภาพโพสต์</div>
      <input type="file" accept="image/*" name="upload[]" multiple  />
    </div>  
<style>
  #dropzone {
  position: relative;
  border: 4px dotted #495057;
  border-radius: 20px;
  color: #495057;
  font: bold 24px/200px arial;
  height: 200px;
  margin: 30px auto;
  text-align: center;
  width: 100%;
  cursor: pointer;
}

#dropzone.hover {
  border: 10px solid #FE5;
  color: #FE5;
  cursor: pointer;
}

#dropzone.dropped {
  background: #eeee;
  border: 4px solid #444;
}

#dropzone div {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  cursor: pointer;
}

#dropzone img {
  border-radius: 10px;
  vertical-align: middle;
  max-width: 95%;
  max-height: 95%;
}

#dropzone [type="file"] {
  cursor: pointer;
  position: absolute;
  opacity: 0;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
}
</style>
 
  <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />   
<script>

$(function() {
  
  $('#dropzone').on('dragover', function() {
    $(this).addClass('hover');
  });
  
  $('#dropzone').on('dragleave', function() {
    $(this).removeClass('hover');
  });

  $('#dropzone').on("sendingmultiple", function(file, xhr, formData) {
                console.log('sendingmultiple')
                var data = $('#frm_n').serializeArray();
                $.each(data, function(key, el) {
                    formData.append(el.name, el.value);
                });
               // $('#preloader').show()
            });
  
  $('#dropzone input').on('change', function(e) {
    var file = this.files[0];

    $('#dropzone').removeClass('hover');
    
   
    
    $('#dropzone').addClass('dropped');
    $('#dropzone img').remove();
    
    if ((/^image\/(gif|png|jpeg)$/i).test(file.type)) {
      var reader = new FileReader(file);

      reader.readAsDataURL(file);
      
      reader.onload = function(e) {
        var data = e.target.result,
            $img = $('<img />').attr('src', data).fadeIn();
        
        $('#dropzone div').html($img);
      };
    } else {
      var ext = file.name.split('.').pop();
      
      $('#dropzone div').html(ext);
    }
  });
});

    // var myDropzone
    // Dropzone.options.myGreatDropzone = { // camelized version of the `id` 
    //     dictDefaultMessage: "<i class='bi bi-file-image'></i> รูปภาพ   ( ไม่เกิน 5 รูป)",
    //     autoProcessQueue: true,
    //     addRemoveLinks: true,
    //     paramName: 'model[pic_upload]',
    //     uploadMultiple: true,
    //     parallelUploads: 10,
    //     maxFiles: 5,
    //     resizeWidth: 640, 
    //     resizeQuality: 0.7,
    //     acceptedFiles: "image/*",
    //     init: function() {
    //         myDropzone = this;

    //         // First change the button to actually tell Dropzone to process the queue.
    //         this.on("complete", function() {
    //             console.log('complete')
    //            //  location.href = '/manage/worker/post'
    //            //location.reload() 
    //         });

    //         this.on("success", function() {
    //             console.log('success')
    //             // location.href = '/manage/worker/post'
    //         });

    //         this.on('error', function(file, response) {
    //             console.log('error')
    //             console.log(response)

    //         });
    //         this.on("sendingmultiple", function(file, xhr, formData) {
    //             console.log('sendingmultiple')
    //             var data = $('#frm_n').serializeArray();
    //             $.each(data, function(key, el) {
    //                 formData.append(el.name, el.value);
    //             });
    //            // $('#preloader').show()
    //         });
    //         this.on("successmultiple", function(files, response) {
    //             console.log('successmultiple')
    //             // location.reload() 
    //         });
    //         this.on("errormultiple", function(files, response) {
    //             console.log('errormultiple')
    //         });

    //     }
    // };
 
</script>
 