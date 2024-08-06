@extends('layouts.main_layout')
@section('title', "หน้าหลัก")
@section('description', "")
@section('keywords', "")
@section('content') 
    @include('layouts.section.SearchHero')
    <main class="content" style="margin-top:80px">

        @include('layouts.section.Content2Col')
        @include('layouts.section.CallToAction') 
        <div class="container-fluid p-0">
           
            
 
            
        </div>
    </main>

    @include('layouts.section.ScrollToTop') 
    <style>
       
    </style>
    <script>
       
    </script>
@endsection
