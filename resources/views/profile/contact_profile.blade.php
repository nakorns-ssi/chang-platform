<div class="card my-2">
    <div class="card-body row justify-content-center">
        <div class="col-sm-6 my-2"> 
        <div class="text-center text-sm-start">
            <div class="h4">{{$title}}</div>  
        </div> 
        <ul class="list-inline">
            <li class="list-inline-item">   
                <a href="tel:{{$model->profile_phone}}">
                    <h6 class="d-inline"><i class="bi bi-telephone-fill" style="font-size: larger" ></i>  
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
                    <h6 class="d-inline"><i class="bi bi-envelope" style="font-size: larger" ></i>  
                        @if($model->profile_email)
                        {{$model->profile_email}} 
                        @else
                        ไม่ระบุ
                        @endif
                    </h6>
                </a>   
            </li> 
        </ul> 
        </div>

        <div class="col-sm-3 my-2"> 
            @include('profile.skills_profile',['title'=>'ความถนัด' ,'model'=>$worker_profile['profile_ability']]) 
         
        </div> 
        <div class="col-sm-3 my-2"> 
            @include('profile.skills_profile',['title'=>'ทักษะพิเศษ' ,'model'=>$worker_profile['profile_skills'] ]) 
           
        </div> 
    </div>
</div> 