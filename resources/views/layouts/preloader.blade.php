<div id="preloader"> <img  class="blink" src="{{ asset('chang_prompt/img/logo.gif') }}" alt=""></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <style>
    @-webkit-keyframes blinker {
  from {opacity: 1.0;}
  to {opacity: 0.0;}
}
.blink{
  position: fixed; 
  top: calc(50% - 4px);
  left: calc(50% - 4px); 
  width: 160px;
  height: auto;
transform: translate(-50%, -50%);
	text-decoration: blink;
	-webkit-animation-name: blinker;
	-webkit-animation-duration: 0.7s;
	-webkit-animation-iteration-count:infinite;
	-webkit-animation-timing-function:ease-in-out;
	-webkit-animation-direction: alternate;
}
  </style>