@extends('manage.manage_layout')
@section('title', 'จัดการงาน')
@section('description', '')
@section('keywords', '')
@section('content')
<div class="bg-light" style="min-height: 100vh"> 
    @include('manage.manage_header') 
    
      {{-- @include('manage.MyHero') --}}
      <section></section>
      @include('manage.MyProfile') 
      @include('manage.MyPosts_worker') 
      
    
    
    <style> 
    </style>
    <script></script>
    @include('manage.bottom_nav')
    @include('layouts.section.ScrollToTop')
</div>
@endsection
