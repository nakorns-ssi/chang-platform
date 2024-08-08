@extends('layouts.main_layout')
@section('title', "ช่างเหล็ก | The Thailand's Steel Work Marketplace")
@section('description', "รับทำเหล็กดัด มุ้งลวด สแตนเลส หน้าต่างเหล็กดัด ประตูเหล็กดัด ราวบันไดเหล็กดัด ประตูรั้ว โครงหลังคา กันสาด")
@section('keywords', "มุ้งลวด สแตนเลส หน้าต่างเหล็กดัด ประตูเหล็กดัด ราวบันไดเหล็กดัด ประตูรั้ว โครงหลังคา กันสาด งานเหล็ก โครงเหล็กโครงหลังคา งานหลังคา ช่างต่อเติมหลังคาโรงรถ")
@section('content')
    @include('layouts.Header') 
    
    <main class="content" style="margin-top:80px">
        @include('layouts.section.SearchHero')
        @include('layouts.section.Content2Col')
        @include('layouts.section.CallToAction') 
        <div class="container-fluid p-0">
           
            
 
            
        </div>
    </main>

    @include('layouts.section.ScrollToTop') 
    @include('layouts.Footer')
    <style>
       
    </style>
    <script>
       
    </script>
@endsection
