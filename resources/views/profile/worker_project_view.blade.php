@extends('layouts.main_layout')
@section('title', '')
@section('description', '')
@section('keywords', '')
@section('content')
    {{-- @include('manage.manage_header') --}}

    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-center">


            <div class=" h5">{{ $model->posts_title }}</div>
        </div>
    </header><!-- End Header -->
    <main class="container  bg-light" style="margin-top:80px">
        <div class="gg-container">
            <div class="gg-box" id="square-dark">
                @foreach ($upload as $val)
                    <img src="{{ $val->url }}">
                @endforeach
            </div>
        </div>
    </main>
    <link rel="stylesheet" href="{{ asset('plugins/grid-gallery/css/grid-gallery.min.css') }}">
    <script src="{{ asset('plugins/grid-gallery/js/grid-gallery.min.js') }}"></script>
    <style>
        .gg-container {
            --gap-length: 8px;
        }

        .gg-box img {
            object-fit: contain; 
        }
    </style>

    <script>
        gridGallery({
            selector: "#square-dark",
            darkMode: true,
            layout: "square",
            gapLength: 3
        });
    </script>
@endsection
