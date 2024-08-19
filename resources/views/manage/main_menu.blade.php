@extends('manage.manage_layout')
@section('title', 'จัดการงาน')
@section('description', '')
@section('keywords', '')
@section('content') 
    @include('manage.manage_header')
    <div class="container-fluid" style="margin-top: 80px">  
      {{-- @include('manage.MyHero') --}} 
      @include('manage.MyProfile') 
      @include('manage.MyPosts_worker') 
      @include('manage.MyPosts_project_owner') 
    </div>
     
   
    @include('manage.bottom_nav')
    

@include('layouts.section.ScrollToTop')
<style> 
</style>
<script>
   function do_loading() {
            console.log('do_loading') 
            $('#preloader').show()
        }
</script>
@endsection
