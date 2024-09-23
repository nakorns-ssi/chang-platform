 
    <div class="row g-2 align-items-center justify-content-between mb-3">
        <div class="col-4">
            <h6 class="mb-0   ">โพสต์</h6>
        </div> 
        <div class="col-8">
            <div class="row align-items-center g-2">
                <div class="col">
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                        <div class="progress-bar  bg-info" style="width: {{100/($step_total/$step)}}%"></div>
                    </div>
                </div>
                <div class="col-3    me-1" style="width: auto;font-size: 11px;">ขั้นตอนที่ {{$step}}/{{$step_total}}</div>
            </div>
        </div>
    </div>
    <?php 
      use App\Models\chang_prompt\Posts; 
      $model =   new Posts;  
        $model->price_min = 0;
        $model->price_max = 0;
      ?>  
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 ">
            
                <div class="mb-3 text-center text-sm-start">
                    <label for="posts_content" class="form-label fs-6 fw-semibold"><i class="bi bi-pencil"></i> เขียนโพสต์ * </label>
                    <textarea class="form-control" id="posts_content" name="posts[posts_content]" placeholder="ระบุ รับจ้างทั่วไป หรือ ความสามารถอื่นๆของคุณ" rows="6" required >{{$model->posts_content}}</textarea>
                    
                </div>
                <div class="mb-3 text-center text-sm-start">
                    <label for="price_min" class="form-label fs-6 fw-semibold"><i class="bi bi-cash-coin"></i> ช่วงราคา</label>
                    <div class="input-group mb-1">
                        <div class="input-group-text" id="price_min">เริ่มต้น ฿</div>
                        <input type="number" name="posts[price_min]" value="{{$model->price_min}}" class="form-control" placeholder="ราคาเริ่มต้น"  > 
                     </div>
                     <div class="input-group mb-1"> 
                        <div class="input-group-text" id="price_max">สิ้นสุด ฿</div>
                        <input type="number" name="posts[price_max]" value="{{$model->price_max}}" class="form-control" placeholder="ราคาสิ้นสุด"  >
                     </div>
                </div>
                <div class="mb-3 text-center text-sm-start">
                    @include('manage.regis._location_regis_frm')
                </div>
                <div class="mb-3 text-center text-sm-start">
                    @include('manage.regis._upload_regis_frm')
                </div> 
                <div class="mb-3 text-center text-sm-start">
                    <div class="input-group mb-3">
                        <button class="btn btn-light border" type="button"><i class="bi bi-eye-fill"></i> การมองเห็น</button>
                        <select class="form-select" id="status_code" name="posts[status_code]" aria-label="การมองเห็น โพสต์">
                           
                          <option value="published" 
                            <?php if($model->status_code == 'published') echo 'selected' ?>
                           >เผยแพร่</option>
                          <option value="private"  
                            <?php if($model->status_code == 'private') echo 'selected' ?>
                             >ส่วนตัว</option> 
                        </select>
                      </div>
                </div>
               
            </div>
        </div> 
 
        <input type="hidden" name="model[id]"  value="{{$model->id}}"  >
         <input type="hidden" name="model[posts_type]"  value="{{$model->posts_type}}"  > 
   
   
        
  