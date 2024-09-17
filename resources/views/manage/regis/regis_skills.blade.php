 
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

                                if(!isset($model['profile_work_history'][0])){
                                    $model['profile_work_history'][0]=null;
                                }

                                if(!isset($model['work_category'][0])){
                                    $model['work_category'][0]=null;
                                }
                                if(!isset($model['work_category_other'][0])){
                                    $model['work_category_other'][0]=null;
                                }

                                if(!isset($model['work_sub_category'][0])){
                                    $model['work_sub_category'][0]=null;
                                }
                                if(!isset($model['work_sub_category_other'][0])){
                                    $model['work_sub_category_other'][0]=null;
                                }
                                if(!isset($model['skill'][0])){
                                    $model['skill'][0]=null;
                                }
                                if(!isset($model['skill_other'][0])){
                                    $model['skill_other'][0]=null;
                                }
                                if(!isset($model['product'][0])){
                                    $model['product'][0]=null;
                                }
                                if(!isset($model['product_other'][0])){
                                    $model['product_other'][0]=null;
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
                <h5>ประเภทงาน</h5>
                <?php 
                $work_category = [ 
                     "งานเหล็ก" ,"งานไฟฟ้า","งานประปา","งานสี","งานปูน", "งานไม้"  
                ]; 
                    ?>
                    <div class="row g-2">
                        @foreach ($work_category as $key => $item)
                        <?php 
                        $checked = '';
                        if(isset($model['work_category'])){
                            if( in_array($item ,$model['work_category']) ){
                                $checked = 'checked';
                            }
                        }
                        ?>
                        <div class=" col-4 col-sm-3 flex-fill ">
                            <label class="w-100" for="work_category{{$key}}"> 
                                <div class="card bg-primary-subtle fs-6  mb-1 p-2">
                                    {{$item}}
                                  <input type="checkbox" id="work_category{{$key}}" 
                                  name="skills[work_category][]" value="{{$item}}"
                                  {{$checked}}
                                  >
                                </div>
                            </label>
                        </div> 
                        @endforeach 
                    </div> 
                    <div class="row g-2">
                        <div class="mb-3  text-start">
                            <label for="work_category_other" class="form-label">ประเภทงาน อื่นๆ</label>
                            <input type="text" class="form-control" id="work_category_other"
                            name="skills[work_category_other][]" value="{{$model['work_category_other'][0]}}" 
                             placeholder=" ระบุ">
                          </div>
                    </div>
            </div>

            <div class="container text-center mt-2"> 
                <h5>ประเภทงานย่อย</h5>
                <?php 
                $work_sub_category = [ 
                    "งานบำรุงรักษา","งานซ่อมแซม","งานติดตั้ง","งานผลิต" 
                ]; 
                    ?>
                    <div class="row g-2">
                        @foreach ($work_sub_category as $key => $item)
                        <?php 
                        $checked = '';
                        if(isset($model['work_sub_category'])){
                            if( in_array($item ,$model['work_sub_category']) ){
                                $checked = 'checked';
                            }
                        }
                        ?>
                        <div class=" col-4 col-sm-3 flex-fill ">
                            <label class="w-100" for="work_sub_category{{$key}}"> 
                                <div class="card bg-primary-subtle fs-6  mb-1 p-2">
                                    {{$item}}
                                  <input type="checkbox" id="work_sub_category{{$key}}" 
                                  name="skills[work_sub_category][]" value="{{$item}}"
                                  {{$checked}}
                                  >
                                </div>
                            </label>
                        </div> 
                        @endforeach 
                    </div> 
                    <div class="row g-2">
                        <div class="mb-3 text-start ">
                            <label for="work_sub_category_other" class="form-label">ประเภทงานย่อย อื่นๆ</label>
                            <input type="text" class="form-control" id="work_sub_category_other"
                            name="skills[work_sub_category_other][]" value="{{$model['work_sub_category_other'][0]}}" 
                             placeholder=" ระบุ">
                          </div>
                    </div>
            </div>

            <div class="container text-center mt-2"> 
                <h5>ทักษะ</h5>
                <?php 
                $skill = [ 
                    "เชื่อมฟลักซ์คอร์","เชื่อมแก๊ส","เชื่อมทิก" ,"เชื่อมแม๊ก","เชื่อมอาร์กโลหะด้วยมือ"
                    ,"ประกอบโครงสร้างเหล็ก" ,"ตัดเหล็กกล้าคาร์บอนด้วยแก๊ส" ,"กลึง"
                ]; 
                    ?>
                    <div class="row g-2">
                        @foreach ($skill as $key => $item)
                        <?php 
                        $checked = '';
                        if(isset($model['skill'])){
                            if( in_array($item ,$model['skill']) ){
                                $checked = 'checked';
                            }
                        }
                        ?>
                        <div class=" col-4 col-sm-3 flex-fill ">
                            <label class="w-100" for="skill{{$key}}"> 
                                <div class="card bg-primary-subtle fs-6  mb-1 p-2">
                                    {{$item}}
                                  <input type="checkbox" id="skill{{$key}}" 
                                  name="skills[skill][]" value="{{$item}}"
                                  {{$checked}}
                                  >
                                </div>
                            </label>
                        </div> 
                        @endforeach 
                    </div> 
                    <div class="row g-2">
                        <div class="mb-3 text-start ">
                            <label for="skill_other" class="form-label">ทักษะ อื่นๆ</label>
                            <input type="text" class="form-control" id="skill_other"
                            name="skills[skill_other][]" value="{{$model['skill_other'][0]}}" 
                             placeholder=" ระบุ">
                          </div>
                    </div>
            </div>

            <div class="container text-center mt-2"> 
                <h5>สินค้า</h5>
                <?php 
                $product = [ 
                    "เหล็กดัด","มุ้งลวด","ประตู" ,"รั้ว","โรงรถ","บ้านนอคดาวน์" 
                ]; 
                    ?>
                    <div class="row g-2">
                        @foreach ($product as $key => $item)
                        <?php 
                        $checked = '';
                        if(isset($model['product'])){
                            if( in_array($item ,$model['product']) ){
                                $checked = 'checked';
                            }
                        }
                        ?>
                        <div class=" col-4 col-sm-3 flex-fill ">
                            <label class="w-100" for="product{{$key}}"> 
                                <div class="card bg-primary-subtle fs-6  mb-1 p-2">
                                    {{$item}}
                                  <input type="checkbox" id="product{{$key}}" 
                                  name="skills[product][]" value="{{$item}}"
                                  {{$checked}}
                                  >
                                </div>
                            </label>
                        </div> 
                        @endforeach 
                    </div> 
                    <div class="row g-2">
                        <div class="mb-3 text-start ">
                            <label for="product_other" class="form-label">สินค้า อื่นๆ</label>
                            <input type="text" class="form-control" id="product_other"
                            name="skills[product_other][]" value="{{$model['product_other'][0]}}" 
                             placeholder=" ระบุ">
                          </div>
                    </div>
            </div>