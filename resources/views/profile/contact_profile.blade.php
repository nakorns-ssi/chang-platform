<div class="card my-2">
    <div class="card-body">
        
        
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
</div> 