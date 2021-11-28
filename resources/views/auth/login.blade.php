@extends('layouts.app')

@section('content')
<style>
    .input {
        transition: border 0.2s ease-in-out;
        min-width: 280px
    }

    .input:focus+.label,
    .input:active+.label,
    .input.filled+.label {
        font-size: .75rem;
        transition: all 0.2s ease-out;
        top: -0.1rem;
        color: #667eea;
    }

    .label {
        transition: all 0.2s ease-out;
        top: 0.4rem;
      	left: 0;
    }
</style>
<main class="sm:container sm:mx-auto sm:max-w-lg sm:m-10">
    <div class="flex ">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg ">
    <div class="shadow-xl p-10 bg-white max-w-xl rounded bg-gray-100">
       <center> <img src="{{ asset('/storage/logo1.png') }}" class="rounded-full w-24 h-24 bg-center "></center>
        <h1 class="text-4xl text-center font-black py-7">      {{ __('Login') }}</h1>

    <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('login') }}">
        @csrf
    <div class="mb-4 relative">
        <input class="input border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-indigo-600 focus:outline-none active:outline-none active:border-indigo-600"  @error('email') border-red-500 @enderror" name="email" id="email" type="email"
        value="{{ old('email') }}" required autocomplete="email" autofocus>
        <label for="email" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">     {{ __('E-Mail Address') }}:</label>
        @error('email')
        <p class="text-red-500 text-xs italic mt-4">
            {{ $message }}
        </p>
        @enderror

    </div>
    <div class="mb-4 relative">
        <input class="input border border-gray-400 appearance-none rounded w-full px-3 py-3 pt-5 pb-2 focus focus:border-indigo-600 focus:outline-none active:outline-none active:border-indigo-600" @error('password') border-red-500 @enderror" name="password" id="password" type="password" required>
        <label for="password" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">{{ __('Password') }}:</label>

        @error('password')
        <p class="text-red-500 text-xs italic mt-4">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div class="flex items-center">
        <label class="inline-flex items-center text-sm text-gray-700" for="remember">
            <input type="checkbox" name="remember" id="remember" class="form-checkbox"
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

    <div class="flex flex-wrap  ">
      <button type="submit"
        class=" m-auto bg-indigo-600 object-center hover:bg-blue-dark text-white font-bold py-3 px-12 rounded ">
            {{ __('Login') }}
        </button>

        @if (Route::has('register'))
        <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
            {{ __("Don't have an account?") }}
            <a class="text-blue-500 hover:text-blue-700 no-underline hover:underline" href="{{ route('register') }}">
                {{ __('Register') }}
            </a>
        </p>
        @endif
    </div>
    </form>
</div>
            </section>
        </div>
    </div>
</main>


<script>
    var toggleInputContainer = function (input) {
        if (input.value != "") {
            input.classList.add('filled');
        } else {
            input.classList.remove('filled');
        }
    }

    var labels = document.querySelectorAll('.label');
    for (var i = 0; i < labels.length; i++) {
        labels[i].addEventListener('click', function () {
            this.previousElementSibling.focus();
        });
    }

    window.addEventListener("load", function () {
        var inputs = document.getElementsByClassName("input");
        for (var i = 0; i < inputs.length; i++) {
            console.log('looped');
            inputs[i].addEventListener('keyup', function () {
                toggleInputContainer(this);
            });
            toggleInputContainer(inputs[i]);
        }
    });
</script>



@endsection
