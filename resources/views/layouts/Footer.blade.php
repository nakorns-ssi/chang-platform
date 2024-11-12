<!-- ======= Footer ======= -->
<footer id="footer">

  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-6 col-md-6 footer-contact text-center">
          <h3>{{env('APP_NAME')}}</h3>
          <p>The Thailand's Steel Work Marketplace</p>
          <img class="me-3 img-fluid " src="{{ asset('chang_prompt/img/chang_prompt_logo.svg') }}"
           alt="{{env('APP_NAME')}} โลโก้" style="width: 7rem" >
          <p>
            ติดต่อเอสเอสไอ (สำนักงานกรุงเทพฯ) <br>
            28/1 อาคารประภาวิทย์ ชั้น 2-3 ถนนสุรศักดิ์<br>
            แขวงสีลม เขตบางรัก กรุงเทพฯ 10500 <br><br>
            <strong>Phone:</strong> (662) 238-3063-82<br>
            <strong>Email:</strong><a  href="mailto:contact.dgc@ssi-steel.com">contact.dgc@ssi-steel.com</a><br>
          </p>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Useful Links</h4>
          <ul> 
            <li><i class="bx bx-chevron-right"></i> <a href="{{url('/about_us')}}">About us</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li> 
          </ul>
        </div>

        

      </div>
    </div>
  </div>

  <div class="container d-md-flex py-4">

    <div class="me-md-auto text-center text-md-start">
      <div class="copyright">
        &copy; Copyright <strong><a class="text-danger" target="_blank" href="https://www.ssi-steel.com/" title="Sahaviriya Steel Industries PLC">Sahaviriya Steel Industries PLC</a></strong>. All Rights Reserved
      </div>
      <div class="credits">
        
        Designed by <a class="text-dark  " href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
    <div class="social-links text-center text-md-right pt-3 pt-md-0 pe-4">
      {{-- <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a> --}}
      <a href="https://www.facebook.com/profile.php?id=61558587123168&mibextid=ZbWKwL" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
      <a href="https://lin.ee/hOLk9Gp" target="_blank" class="facebook"><i class='fab fa-line  '></i></a>
      {{-- <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
      <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
      <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> --}}
    </div>
  </div>
</footer><!-- End Footer -->