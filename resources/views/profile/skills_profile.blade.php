 
        <div class="text-start text-sm-center">
            <div class="h4">{{$title}}</div>  
        </div>
        <div class="d-block p-2   ">
            @foreach ($model as $key => $item ) 
            <a href="/search?q={{$item}}" class="   ">
            <span class="badge text-bg-warning fw-light me-1 ">#{{$item}}</span> 
            </a>
            @endforeach
        </div> 
 