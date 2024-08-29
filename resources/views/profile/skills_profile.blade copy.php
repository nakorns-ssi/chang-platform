<div class="card my-2">
    <div class="card-body">  
        <div class="text-center text-sm-start">
            <div class="h4">{{$title}}</div>  
        </div>
        <div class="d-block p-2   ">
            @foreach ($model as $key => $item ) 
            <span class="badge text-bg-warning fw-light me-1 ">{{$item}}</span> 
            @endforeach
        </div> 
    </div>
</div>