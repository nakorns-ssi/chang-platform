@extends('manage.manage_layout')
@section('title', 'จัดการงาน')
@section('description', '')
@section('keywords', '')
@section('content')
    @include('manage.manage_header') 
    
      {{-- @include('manage.MyHero') --}}
      <section></section>
      @include('manage.MyProfile')
      @include('manage.MyPosts')
      @include('manage.MyPosts_worker')
      @include('manage.MyPosts_project_owner')
  
      
    
    
    <style> 
    </style>
    <script></script>
    @include('manage.bottom_nav')
    @include('layouts.section.ScrollToTop')
@endsection
