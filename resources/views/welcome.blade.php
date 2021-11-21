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
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 {{-- <script src="{{ mix('js/app.js') }}"></script> --}}

</head>

@extends('layouts.app')

@section('content')


<!-- Sign in -->
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

<!--Statistic Card-->

        <div class=" flex items-center bg-white">
            <div class="w-full mx-auto py-6 sm:px-6 ">
                <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">
                    <div class="w-full lg:w-1/4">
                        <div class="widget w-full p-4 rounded-lg bg-white border border-gray-400 dark:bg-gray-900 dark:border-gray-800">
                            <div class="flex flex-row items-center justify-between">
                                <div class="flex flex-col">
                                    <div class="text-xs uppercase font-light text-gray-700">
                                        Customers
                                    </div>
                                    <div class="text-xl font-bold">
                                        23
                                    </div>
                                </div>
                                <svg class="stroke-current text-gray-700" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2">
                                    </path>
                                    <circle cx="9" cy="7" r="4">
                                    </circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87">
                                    </path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/4">
                        <div class="widget w-full p-4 rounded-lg bg-white border border-gray-400 dark:bg-gray-900 dark:border-gray-800">
                            <div class="flex flex-row items-center justify-between">
                                <div class="flex flex-col">
                                    <div class="text-xs uppercase font-light text-gray-500">
                                        PREVIEWS
                                    </div>
                                    <div class="text-xl font-bold">
                                        45
                                    </div>
                                </div>
                                <svg class="stroke-current text-gray-500" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12">
                                    </polyline>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/4">
                        <div class="widget w-full p-4 rounded-lg bg-white border border-gray-400 dark:bg-gray-900 dark:border-gray-800">
                            <div class="flex flex-row items-center justify-between">
                                <div class="flex flex-col">
                                    <div class="text-xs uppercase font-light text-gray-500">
                                        Links
                                    </div>
                                    <div class="text-xl font-bold">
                                        4078
                                    </div>
                                </div>
                                <svg class="stroke-current text-gray-500" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6">
                                    </path>
                                    <polyline points="15 3 21 3 21 9">
                                    </polyline>
                                    <line x1="10" x2="21" y1="14" y2="3">
                                    </line>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/4">
                        <div class="widget w-full p-4 rounded-lg bg-white border border-gray-400 dark:bg-gray-900 dark:border-gray-800">
                            <div class="flex flex-row items-center justify-between">
                                <div class="flex flex-col">
                                    <div class="text-xs uppercase font-light text-gray-500">
                                        Watch Time
                                    </div>
                                    <div class="text-xl font-bold">
                                        31h 2m
                                    </div>
                                </div>
                                <svg class="stroke-current text-gray-500" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="10">
                                    </circle>
                                    <polyline points="12 6 12 12 16 14">
                                    </polyline>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!--Carosuel for latest book-->
        <div class="single-item">
            <div>your content</div>
            <div>your content</div>
            <div>your content</div>
          </div>



<script>
    $(document).ready(function(){
        $('.single-item').slick();
    });

  </script>



</body>
</html>
@endsection
