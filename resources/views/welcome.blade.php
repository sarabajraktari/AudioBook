<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> AudioBook</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
      <link href="{{ mix('css/app.css') }}" rel="stylesheet">
 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
</head>

@extends('layouts.app')

@section('content')


<!-- component -->
<section class="w-full h-full bg-black ">
  <div class="container mt-2  py-10 mx-auto flex flex-wrap items-center justify-center bg-no-repeat bg-contain " style="background-image: url('{{ asset('storage/audioBook1.jpg')}}');">

     <div class="lg:w-1/2 lg:pr-0 pr-0 ">
       {{-- <h1 class="title-font font-medium font-bold text-5xl ">Audio Book</h1>
       <p class="leading-relaxed text-yellow-300  font-medium font-bold text-2xl">Listening to a book is not only just
                             as good as reading it. Sometimes, perhaps even often, it’s better.</p> --}}
        <br><br><br><br><br><br><br>


    </div>
    <div class=" border-2 border-white lg:w-3/6 xl:w-2/5 md:w-2/3 bg-black opacity-90 rounded-lg p-8 flex flex-col lg:ml-auto w-full mt-10 lg:mt-20">
        <h2 class="text-white text-xl font-medium title-font font-bold mb-5">Login</h2>
    <form class="" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="relative mb-4 ">
            <label for="email" class="leading-7 text-sm text-gray-300 ">
                {{ __('E-Mail Address') }}:
            </label>

            <input id="email" type="email"
                class="w-full bg-white rounded border border-gray-300 focus:border-white focus:ring-2 focus:ring-white text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out form-input w-full @error('email') border-red-500 @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
            </p>
            @enderror
        </div>

        <div class="relative mb-4">
            <label for="password" class="leading-7 text-sm text-gray-300">
                {{ __('Password') }}:
            </label>

            <input id="password" type="password"
                class="w-full bg-white rounded border border-gray-300 focus:border-white focus:ring-2 focus:ring-white text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out form-input w-full @error('password') border-red-500 @enderror" name="password"
                required>

            @error('password')
            <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
            </p>
            @enderror
        </div>

        <div class="flex items-center mb-4">
            <label class="inline-flex items-center text-sm text-gray-300" for="remember">
                <input type="checkbox" name="remember" id="remember" class="form-checkbox  "
                    {{ old('remember') ? 'checked' : '' }}>
                <span class="ml-2">{{ __('Remember Me') }}</span>
            </label>

            @if (Route::has('password.request'))
            <a class="text-sm text-blue-500 hover:text-blue-700 whitespace-no-wrap no-underline hover:underline ml-auto"
                href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif
        </div>


            <button type="submit"
            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                {{ __('Login') }}
            </button>

            @if (Route::has('register'))
            <p class="w-full text-xs text-center text-gray-300 my-6 sm:text-sm sm:my-8">
                {{ __("Don't have an account?") }}
                <a class="text-blue-500 hover:text-blue-700 no-underline hover:underline" href="{{ route('register') }}">
                    {{ __('Register') }}
                </a>
            </p>
            @endif

    </form>
  </div>
  </div>


</section>
@endsection



</body>
</html>
