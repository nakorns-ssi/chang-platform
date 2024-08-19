<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title') - {{env('APP_NAME')}}</title>

    <meta content="{{env('APP_NAME')}} ช่างหางาน …งานหาช่าง ช่างเหล็ก แพลตฟอร์มช่วยได้ @yield('description')" name="description">
    <meta content="ช่างหางาน งานหาช่าง ช่างเหล็ก ช่างเชื่อม เหล็ก โครงสร้าง @yield('keywords')" name="keywords">
  
    
    <!-- Favicons -->
    
    <link href="{{ asset('chang_prompt/img/chang_prompt_logo.svg') }}" rel="icon">
    <link href="{{ asset('chang_prompt/img/chang_prompt_logo.svg') }}" rel="apple-touch-icon">
  
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('OnePage/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('OnePage/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('OnePage/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('OnePage/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('OnePage/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('OnePage/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('OnePage/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  
    @include('layouts._asset') 

    <!-- Template Main CSS File -->
    
    <link href="{{ asset('chang_prompt/css/style.css') }}" rel="stylesheet">

    @include('layouts._GOOGLE_TAG_MANAGER_HEAD') 
</head>
<body>
    @include('layouts._GOOGLE_TAG_MANAGER_BODY') 

    
    <main id="main">
			 

     
    @yield('content')
     	  
    </main>


    @include('layouts.preloader')
   

    <!-- Vendor JS Files -->
  <script src="{{ asset('OnePage/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('OnePage/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('OnePage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('OnePage/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('OnePage/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('OnePage/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('OnePage/assets/vendor/php-email-form/validate.js') }}"></script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Scripts --> 
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('chang_prompt/js/main.js') }}"></script>
</body>
</html>