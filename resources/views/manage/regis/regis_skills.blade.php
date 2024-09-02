 
    <div class="row g-2 align-items-center justify-content-between mb-3">
        <div class="col-4">
            <h6 class="mb-0   ">โปรไฟล์</h6>
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
        if(!isset($model['profile_work_history'][0])){
            $model['profile_work_history'][0]=null;
        }
        if(!isset($model['profile_project'][0])){
            $model['profile_project'][0]=null;
        }
        if(!isset($model['profile_ability_other'][0])){
            $model['profile_ability_other'][0]=null;
        }
        ?>
    <div class="     px-1 text-start  my-3 "> 
        <div class="row justify-content-center align-items-center">
            <label for="profile_work_history" class="h5">ประวัติการทำงาน</label>
            <textarea class="form-control"   name="skills[profile_work_history][]" 
            rows="3">{{$model['profile_work_history'][0]}}</textarea>
        </div>
    </div>
    <div class="     px-1 text-start  my-3 "> 
        <div class="row justify-content-center align-items-center">
            <label for="profile_project" class="h5">ผลงาน</label>
            <textarea class="form-control"   name="skills[profile_project][]" 
            rows="3">{{$model['profile_project'][0]}}</textarea>
        </div>
    </div>
     

    <div class="container text-center mt-2"> 
        <h5>ความชำนาญ</h5>
        <?php 
        $profile_ability = [ 
            "งานเชื่อม","เหล็กดัด","มุ้งลวด","เหล็กดัดหน้าต่าง", "เหล็กดัดประตู" , "โครงหลังคา" , "งานโครงสร้าง" ,
            "โรงรถ" ,"กันสาด" ,'งานเหล็ก' ,"เฟอร์นิเจอร์" ,"บ้านน็อคดาวน์"
            ,"งานฝ้า" , "งานปูน" ,"งานไม้" ,
           "ทาสี" ,
            "ทาสีผนัง" ,
            "ต่อเติมงานฝ้า" ,
            "ปูกระเบื้อง" ,"อลูมิเนียม" , "สแตนเลส"
        ]; 
            ?>
            <div class="row g-2">
                @foreach ($profile_ability as $key => $item)
                <?php 
                $checked = '';
                if(isset($model['profile_ability'])){
                    if( in_array($item ,$model['profile_ability']) ){
                        $checked = 'checked';
                    }
                }
                ?>
                <div class=" col-4 col-sm-3 flex-fill ">
                    <label class="w-100" for="profile_ability{{$key}}"> 
                        <div class="card bg-primary-subtle fs-6  mb-1 p-2">
                            {{$item}}
                          <input type="checkbox" id="profile_ability{{$key}}" 
                          name="skills[profile_ability][]" value="{{$item}}"
                          {{$checked}}
                          >
                        </div>
                    </label>
                </div> 
                @endforeach 
            </div> 
            <div class="row g-2">
                <div class="mb-3  ">
                    <label for="profile_ability_other" class="form-label">ความชำนาญ อื่นๆ</label>
                    <input type="text" class="form-control" id="profile_ability_other" 
                     name="skills[profile_ability_other][]" value="{{$model['profile_ability_other'][0]}}" placeholder=" ระบุ">
                  </div>
            </div>
  