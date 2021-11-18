<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
      <link href="{{ mix('css/app.css') }}" rel="stylesheet">
 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
@extends('layouts.app')

@section('content')


<div class="hero min-h-screen" style="background-image: url(&quot;https://picsum.photos/id/1005/1600/1400&quot;);">
  <div class="hero-overlay bg-opacity-60"></div> 
  <div class="text-center hero-content text-neutral-content">
    <div class="max-w-md">
      <h1 class="mb-5 text-5xl font-bold">
            Hello there
          </h1> 
      <p class="mb-5">
            Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.
          </p> 
    <a href="/register">  <button class="btn btn-primary" >Sign up now</button></a>
    </div>
  </div>
</div>


@endsection



</body>
</html>
