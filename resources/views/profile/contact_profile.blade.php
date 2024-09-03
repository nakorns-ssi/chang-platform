<div class="card my-2">
    <div class="card-body row justify-content-center">
        <div class="col-sm-6 my-2"> 
        <div class="text-center text-sm-start">
            <div class="h4">{{$title}}</div>  
        </div> 
        <ul class="list-inline">
            <li class="list-inline-item">   
                <a href="tel:{{$model->profile_phone}}">
                    <h6 class="d-inline badge text-bg-warning fw-normal" style="" ><i class="bi bi-telephone-fill" style="font-size: larger" ></i>  
                        @if($model->profile_phone)
                        {{$model->profile_phone}} 
                        @else
                        ไม่ระบุ
                        @endif
                    </h6>
                </a>   
            </li> 
        </ul>
        <ul class="list-inline">
            <li class="list-inline-item">   
                <a href="mailto:{{$model->profile_email}}">
                    <h6 class="d-inline badge text-bg-warning fw-normal" style="" ><i class="bi bi-envelope" style="font-size: larger" ></i>  
                        @if($model->profile_email)
                        {{$model->profile_email}} 
                        @else
                        ไม่ระบุ
                        @endif
                    </h6>
                </a>   
            </li> 
        </ul>
        <ul class="list-inline">
            <li class="list-inline-item">   
                <a href="https://line.me/ti/p/~{{$model->add_line_id}}" target="_blank">
                    <h6 class="d-inline badge text-bg-warning fw-normal" style="" ><i class='fab fa-line   ' style='font-size: larger '></i>   
                        @if($model->add_line_id)
                        {{$model->add_line_id}} 
                        @else
                        ไม่ระบุ
                        @endif
                    </h6>
                </a>   
            </li> 
        </ul>
        </div>
        
            @if(isset($worker_profile['profile_work_history'][0]) )
            <div class="col-sm-3 my-2"> 
                @if($worker_profile['profile_work_history'][0])
                {{$worker_profile['profile_work_history'][0]}} 
                @else
                ไม่ระบุ
                @endif
            </div>
            @endif

            @if(isset($worker_profile['profile_project'][0]) )
            <div class="col-sm-3 my-2"> 
                @if($worker_profile['profile_project'][0])
                {{$worker_profile['profile_project'][0]}} 
                @else
                ไม่ระบุ
                @endif
            </div>
            @endif 
        
            @if(isset($worker_profile['work_category']))
            <div class="col-sm-3 my-2"> 
                @include('profile.skills_profile',['title'=>'ประเภทงาน' ,'model'=>$worker_profile['work_category']]) 
            </div>
             @endif
             @if(isset($worker_profile['work_sub_category']))
            <div class="col-sm-3 my-2"> 
                @include('profile.skills_profile',['title'=>'ประเภทงานย่อย' ,'model'=>$worker_profile['work_sub_category']]) 
            </div>
             @endif
       
            @if(isset($worker_profile['skill']))
            <div class="col-sm-3 my-2"> 
                @include('profile.skills_profile',['title'=>'ทักษะ' ,'model'=>$worker_profile['skill']]) 
            </div>
             @endif

             @if(isset($worker_profile['product']))
            <div class="col-sm-3 my-2"> 
                @include('profile.skills_profile',['title'=>'สินค้า' ,'model'=>$worker_profile['product']]) 
            </div>
             @endif

           
    </div>
</div> 