<div class="accordion" id="accordionProfile">

@foreach ($profile_list as $key => $item)
<?php  
$item_collapse = "collapse_".$key;
?>
<div class="accordion-item border border-dark">
    <div class="accordion-header">
      <button class="accordion-button px-2 py-2  " type="button" style="background: var(--bs-primary);" data-bs-toggle="collapse" 
      data-bs-target="#{{$item_collapse}}" aria-expanded="true" aria-controls="{{$item_collapse}}" >
          ระบุ {{$item}}
      </button>
    </div>
    <div id="{{$item_collapse}}" class="accordion-collapse collapse   " data-bs-parent="#accordionProfile">
      <div class="accordion-body py-2"> 
          <textarea class="form-control" id="{{$key}}" name="model[{{$key}}]" rows="3">{{$model[$key]}}</textarea>
      </div>
    </div>
  </div>
@endforeach
     
    
  </div>