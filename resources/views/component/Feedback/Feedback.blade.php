 
<article  style="margin-bottom: 40px;" >
  <div class="container  px-2" style="max-width: 400px">
    <div class="text-center  ">
      <div class="h4 text-danger">แนะนำติ-ชมบริการ</div>  
    </div> 
    <?php
    $actionPath = '/feedback/save';   
    ?>
    <form action="{{$actionPath}}" method="post" name="frm_n" id="frm_n" enctype="multipart/form-data">
      @csrf  
      <div class="card text-center pt-2 ">  
        <small class="text-black-50 px-2">*ระบบจะไม่ระบุตัวตนของลูกค้า</small> 
        <div class="    mt-2 ">
          @include('component.Feedback.Rating_item',['index'=>0,'rating_item'=>'ใช้งานง่าย'])
          @include('component.Feedback.Rating_item',['index'=>1,'rating_item'=>'ความรวดเร็ว'])
          @include('component.Feedback.Rating_item',['index'=>2,'rating_item'=>'ความน่าเชื่อถือ'])
          @include('component.Feedback.Rating_item',['index'=>3,'rating_item'=>'จะแนะนำเพื่อน'])   
        </div> 

        <div class="    px-3 text-start  mt-3"> 
          <label for="remark" class="form-label">แนะนำเพิ่มเติม</label>
          <textarea class="form-control" id="remark" name="rating[4][แนะนำเพิ่มเติม]" rows="3"></textarea>
        </div> 
        <div class="position-relative mt-5"> 
          <div class="position-absolute top-100 start-50 translate-middle">
            <button class="btn btn-danger text-white btn-lg"  style="width: 130px"
              type="submit" >ส่ง</button>
            </div>
          </div> 
        </div> 

      </div>  
    </form>
          
  </div>
</article> 
 <style>
.rating {
  display: flex;
  width: 100%;
  justify-content: center;
  overflow: hidden;
  flex-direction: row-reverse;
  height: auto;
  position: relative;
}

.rating-0 {
  filter: grayscale(100%);
}

.rating > input {
  display: none;
}

.rating > label {
  cursor: pointer;
  width: 40px;
  height: 40px;
  margin-top: auto;
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
  background-repeat: no-repeat;
  background-position: center;
  background-size: 76%;
  transition: .3s;
}

.rating > input:checked ~ label,
.rating > input:checked ~ label ~ label {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23dc3545' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
}


.rating > input:not(:checked) ~ label:hover,
.rating > input:not(:checked) ~ label:hover ~ label {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23d33948ba' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
}
/* input[id^="rating"][class$="1"]{ transform: translateY(-100px); }
input[id^="rating"][class$="2"]{ transform: translateY(-100px); }
input[id^="rating"][class$="3"]{ transform: translateY(-100px); }
input[id^="rating"][class$="4"]{ transform: translateY(-100px); }
input[id^="rating"][class$="5"]{ transform: translateY(-100px); } */
#rating-1:checked ~ .emoji-wrapper > .emoji { transform: translateY(-100px); }
#rating-2:checked ~ .emoji-wrapper > .emoji { transform: translateY(-200px); }
#rating-3:checked ~ .emoji-wrapper > .emoji { transform: translateY(-300px); }
#rating-4:checked ~ .emoji-wrapper > .emoji { transform: translateY(-400px); }
#rating-5:checked ~ .emoji-wrapper > .emoji { transform: translateY(-500px); }

.feedback {
  max-width: 360px;
  background-color: #fff;
  width: 100%;
  padding: 30px;
  border-radius: 8px;
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
  align-items: center;
  box-shadow: 0 4px 30px rgba(0,0,0,.05);
}
 
 </style>