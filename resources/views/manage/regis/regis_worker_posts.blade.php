 
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
                    <button class="btn btn-sm my-1 btn-warning" type="button" onclick="auto_message()" >
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg"  width="24px" height="24px" viewBox="0 0 97.000000 87.000000"  preserveAspectRatio="xMidYMid meet">  <g transform="translate(0.000000,87.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none"> <path d="M240 783 c-28 -75 -39 -86 -111 -112 -32 -12 -59 -25 -59 -30 0 -4 22 -15 50 -25 72 -26 94 -48 120 -116 13 -34 26 -58 30 -53 4 4 17 34 30 66 25 64 42 79 112 103 26 8 50 19 53 24 3 5 -18 16 -45 25 -71 24 -103 54 -125 119 -11 31 -22 56 -26 56 -4 0 -17 -26 -29 -57z"/> <path d="M616 580 c-15 -43 -39 -90 -53 -104 -14 -14 -63 -40 -109 -57 -46 -17 -84 -35 -84 -39 0 -4 37 -21 82 -36 45 -16 93 -41 108 -56 16 -15 40 -62 56 -107 16 -45 33 -81 39 -81 5 0 23 36 38 80 36 102 63 128 166 164 44 15 81 32 81 36 0 4 -34 20 -76 35 -106 39 -136 67 -170 165 -16 44 -33 80 -39 80 -6 0 -23 -36 -39 -80z"/> <path d="M173 250 c-21 -50 -24 -53 -108 -85 -17 -6 -12 -11 33 -31 47 -21 57 -31 75 -74 12 -28 23 -50 26 -50 4 0 15 24 26 53 19 49 23 53 75 72 l55 19 -58 25 c-53 22 -59 28 -75 73 -9 26 -19 48 -22 48 -3 0 -16 -23 -27 -50z"/> </g> </svg> 
                         สร้างข้อความอัตโนมัติ</button>  
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

<script>
   function auto_message() {
    console.log('auto_message')
    posts_content = $('#posts_content').val()
    profile_display_name = $('#profile_display_name').val()
    profile_phone = $('#profile_phone').val()
    var str = ""
   
    
    
    str += "📢📢📢 หากคุณกำลังมองหาช่างที่มีฝีมือ \n" 
    str += "ติดต่อ ☎️ "+profile_phone+" ["+profile_display_name+"] \n" 
    str +=  " 📍 พร้อมเริ่มงานได้ทันที \n"

    ///////
    str += "👉 ประเภทงาน \n"
    total_category = $('input:checkbox[name^="skills[work_category][]"]').length
    for(var i=0;i<=total_category;i++){  
        text_category = $('#work_category'+i).prop("checked")
        text_value = $('#work_category'+i).val()
        if(text_category){
            str += '    - ✅'+text_value+"  \n"
        }     
	}  
    str += "👉 ประเภทงานย่อย \n"
    total_sub_category = $('input:checkbox[name^="skills[work_sub_category][]"]').length
    for(var i=0;i<=total_sub_category;i++){  
        text_category = $('#work_sub_category'+i).prop("checked")
        text_value = $('#work_sub_category'+i).val()
        if(text_category){
            str += '    - ✅'+text_value+"  \n"
        }     
	} 
    str += "👉 ทักษะ \n"
    total_skill = $('input:checkbox[name^="skills[skill][]"]').length
    for(var i=0;i<=total_skill;i++){  
        text_category = $('#skill'+i).prop("checked")
        text_value = $('#skill'+i).val()
        if(text_category){
            str += '    - ✅'+text_value+"  \n"
        }     
	} 

    str += "👉 สินค้า \n"
    total_skill = $('input:checkbox[name^="skills[product][]"]').length
    for(var i=0;i<=total_skill;i++){ 
        text_category = $('#product'+i).prop("checked")
        text_value = $('#product'+i).val()
        if(text_category){
            str += '    - ✅'+text_value+"  \n"
        }     
	} 

 
    $('#posts_content').val(str)
    
   } 
</script>

          
         
   
   
        
  