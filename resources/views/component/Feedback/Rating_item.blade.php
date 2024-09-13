<div class="row align-items-center">
  <div class="col-sm-6 text-start pr-2"><h5 class="mb-0 mx-3">{{$rating_item}}</h5> </div>
  <div class="col-sm-6 mx-auto">
    <div class=" ">
      <div class="rating my-2 px-4">  
        @for($i=5;$i>=1;$i--)
        <?php 
        $element_name = base64_encode($rating_item)."_".$i;
        ?>
        <input type="radio" name="model[rating][{{$element_name}}]" value="{{$i}}" id="{{$element_name}}">
        <label for="{{$element_name}}"></label>  
        @endfor
      </div> 
    </div>
  </div> 
</div>