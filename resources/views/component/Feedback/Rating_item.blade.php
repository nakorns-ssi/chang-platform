<div class="row align-items-center">
  <div class="col-sm-6 text-start pr-2"><h5 class="mb-0 mx-3">{{$rating_item}}</h5> </div>
  <div class="col-sm-6 mx-auto"> 
      <div class="rating my-2 px-4">  
        @for($i=5;$i>=1;$i--)
          <?php 
          $element_name = "rating".base64_encode($rating_item)."-".$i;
          ?>
          <input type="radio" name="rating[{{$index}}][{{$rating_item}}]" value="{{$i}}" id="{{$element_name}}">
          <label for="{{$element_name}}"></label>  
        @endfor
      </div>  

      {{-- <div class="rating">
        <input type="radio" name="rating" id="test_rating-5">
        <label for="test_rating-5"></label>
        <input type="radio" name="rating" id="test_rating-4">
        <label for="test_rating-4"></label>
        <input type="radio" name="rating" id="test_rating-3">
        <label for="test_rating-3"></label>
        <input type="radio" name="rating" id="test_rating-2">
        <label for="test_rating-2"></label>
        <input type="radio" name="rating" id="test_rating-1">
        <label for="test_rating-1"></label> 
      </div> --}}
  </div> 
</div>