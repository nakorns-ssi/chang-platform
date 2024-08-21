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
            onclick="del_img('{{$value->upload_key}}')"
            >ลบ</button></td>
      </tr> 
      @endforeach 
    </tbody>
  </table>
</div>