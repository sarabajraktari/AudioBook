@extends('layouts.app')

@section('content')

<div class="m-auto w-4/8 py-14">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold"> 
            Update 
        </h1>
    </div>
</div>

<div class="flex justify-center pt-4">
    <form action="/user/{{ $user->id  }}" method="POST">
        @csrf
        @method('PUT')
        <div class="block">
            <input 
                type="text"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                name="name"
                value="{{ $user->name }}">
            
                <input 
                type="text"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                name="email"
                value="{{ $user->email }}">

            

                <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                    Update
                </button>
        </div>
    </form>
</div>
@if ($errors->any())
<div class="w-4/8 m-auto text-center">
    @foreach ($errors->all() as $error)
        <li class="text-red-500 list-none">
            {{ $error }}
        </li>
    @endforeach
</div>

@endif

@endsection

