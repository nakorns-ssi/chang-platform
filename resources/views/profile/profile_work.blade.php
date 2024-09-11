 <div class="card my-2">
    <div class="card-body row justify-content-start"> 
        <div class="text-center text-sm-start">
            <div class="h4">{{$title}}</div>  
        </div> 
        <div class="col-sm-6 "> 
        <div class="d-block p-2   "> 
            @if(isset($model[0]) )
            <div class="col-sm-6 my-2"> 
                @if($model[0])
                {{$model[0]}} 
                @else
                ไม่ระบุ
                @endif
            </div>
            @endif  
        </div> 
        </div> 
    </div> 
</div> 
 