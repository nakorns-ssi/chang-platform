<?php
      $actionPath = '/manage/worker/post/save';
      ?> 
       <form action="{{ $actionPath }}" method="post" name="frm_n" id="frm_n" class="  ">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 ">
            
                <div class="mb-3 text-center text-sm-start">
                    <label for="posts_content" class="form-label fs-6 fw-semibold"><i class="bi bi-pencil"></i> เขียนโพสต์ * </label>
                    <textarea class="form-control" id="posts_content" name="model[posts_content]" rows="6" required >{{$model->posts_content}}</textarea>
                    
                </div>
                <div class="mb-3 text-center text-sm-start">
                    <label for="price_min" class="form-label fs-6 fw-semibold"><i class="bi bi-cash-coin"></i> ช่วงราคา</label>
                    <div class="input-group mb-1">
                        <div class="input-group-text" id="price_min">เริ่มต้น ฿</div>
                        <input type="number" name="model[price_min]" value="{{$model->price_min}}" class="form-control" placeholder="ราคาเริ่มต้น"  > 
                     </div>
                     <div class="input-group mb-1"> 
                        <div class="input-group-text" id="price_max">สิ้นสุด ฿</div>
                        <input type="number" name="model[price_max]" value="{{$model->price_max}}" class="form-control" placeholder="ราคาสิ้นสุด"  >
                     </div>
                </div>
                <div class="mb-3 text-center text-sm-start">
                 @include('manage.worker._location_frm')
                </div>
                <div class="mb-3 text-center text-sm-start">
                    <div class="input-group mb-3">
                        <button class="btn btn-light border" type="button"><i class="bi bi-eye-fill"></i> การมองเห็นโพสต์</button>
                        <select class="form-select" id="status_code" name="model[status_code]" aria-label="การมองเห็น โพสต์">
                           
                          <option value="published" 
                            <?php if($model->status_code == 'published') echo 'selected' ?>
                           >เผยแพร่</option>
                          <option value="private"  
                            <?php if($model->status_code == 'private') echo 'selected' ?>
                             >ส่วนตัว</option> 
                        </select>
                      </div>
                </div>
                <div class="mb-3 text-center">
                    <button type="button"  onclick="do_save()" class="btn btn-primary"> บันทึก</button>
                </div>
            </div>
        </div> 
 
        <input type="hidden" name="model[id]"  value="{{$model->id}}"  >
         <input type="hidden" name="model[posts_type]"  value="{{$model->posts_type}}"  > 
    </form>

   
        
  