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
<div class="header-1 flex flex-col bg-gray-200 min-h-screen">
<div class="flex content-center p-4 lg:py-16 lg:px-8 text-center max-w-xl mx-auto my-auto">
    <div class="px-2">
      <span class="fas fa-bookmark w-12 h-12 lg:w-16 lg:h-16 bg-purple-700 rounded-full text-center text-white text-lg lg:text-2xl pt-4 lg:pt-5"></span>
      <h1 class="text-center text-4xl lg:text-5xl my-3 lg:mt-4">Hello, world!</h1>
      <p class="text-xl">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid autem dolore dolorem ea inventore molestiae nemo neque non, quidem recusandae soluta tenetur! Aut eaque, placeat!</p>
      <button class="bg-purple-700 hover:bg-purple-800 text-white py-2 px-4 lg:py-3 lg:px-6 rounded mt-6 lg:mt-12">Learn more</button>
    </div>
  </div>
</div>

@endsection
{{-- 
 <div class="flex flex-col">
    @if(Route::has('login'))
        <div class="absolute top-0 right-0 mt-4 mr-4 space-x-4 sm:mt-6 sm:mr-6 sm:space-x-6">
            @auth
                <a href="{{ url('/home') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Home') }}</a>
            @else
                <a href="{{ route('login') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Login') }}</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Register') }}</a>
                @endif
            @endauth
        </div>
    @endif  --}}

    

</body>
</html>
