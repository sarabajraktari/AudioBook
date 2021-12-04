@extends('layouts.app')

@section('content')

<div class="m-auto w-4/8 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold">
            Create book
        </h1>
    </div>
</div>

<div class="flex justify-center pt-20">
    <form action="/admin/books" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="block">
            <input
                type="file"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                name="image">
            <input
                type="text"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                name="title"
                placeholder="Book title...">

                <input
                type="text"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                name="author"
                placeholder="Author...">

                <input
                type="text"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                name="description"
                placeholder="Description...">

                <input
                type="text"
                class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
                name="pages"
                placeholder="Pages...">

                <button type="submit" class=" mt-10 bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                    Submit
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


