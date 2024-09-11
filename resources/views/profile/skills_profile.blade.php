<div class="card my-2">
    <div class="card-body row justify-content-start">
        <div class="col-sm-6 my-2"> 
            <div class="text-center text-sm-start">
                <div class="h4">{{$title}}</div>  
            </div>
             
            <div class="d-block p-2   ">
                @foreach ($model as $key => $item ) 
                <a href="/search?q={{$item}}" class="   ">
                <span class="badge text-bg-warning fw-light me-1 ">#{{$item}}</span> 
                </a>
                @endforeach
            </div> 
        </div>
    </div>
</div>
 