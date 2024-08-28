 
 
 <?php $title = $title; ?>
<div class="container  ">
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($upload as $key => $img)
            <?php 
            $active = "";
            if($key == 0) { $active = "active"; } 
             ?> 
            <div class="carousel-item  ">
                <a href="{{$img->url}}" target="_blank" > 
                <img src="{{$img->url}}" class="d-block w-100 {{$active}}" alt="{{$title}} รูปสินค้า  {{$key}}">
                </a>
            </div> 
            @endforeach

        </div>
        <button class="carousel-control-prev  " type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-dark rounded" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-dark rounded" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    
</div>

<script> 

let currentSlide = 0;
let slides = document.querySelectorAll('.carousel-item');
let indicators = document.querySelectorAll('.indicator');

function nextSlide() {
  currentSlide = (currentSlide + 1) % slides.length;
  updateCarousel();
}

function prevSlide() {
  currentSlide = (currentSlide - 1 + slides.length) % slides.length;
  updateCarousel();
}

function goToSlide(index) {
  currentSlide = index;
  updateCarousel();
}

function updateCarousel() {
slides.forEach((slide, index) => {
   slide.classList.toggle('active', index === currentSlide);
  });
indicators.forEach((indicator, index) => {
   indicator.classList.toggle('active', index === currentSlide);
  });
}

//setInterval(nextSlide, 3000);

updateCarousel();
    
</script>