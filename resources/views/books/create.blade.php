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
                <h1>Chapters</h1>

                    <table class="border-collapse border border-green-800 chapterlist">
                        <thead>
                          <tr>
                            <th class="border border-green-600 w-1/2 px-24">Chapter Name</th>
                            <th class="border border-green-600 w-1/2 px-24">Reader</th>
                            <th class="border border-green-600 w-1/2 px-24">Time</th>
                            <th class="border border-green-600 w-1/2 px-24">Audio</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="border border-green-600 ...">
                                <input
                                type="text"
                                name="chapter_name"
                                placeholder="Chapter name"
                                class="block shadow-5xl p-2 w-80  focus:outline-none ">
                            </td>
                            <td class="border border-green-600 ...">
                                <input
                                 type="text"
                                 name="reader"
                                 placeholder="Reader"
                                 class="block shadow-5xl p-2 w-80  focus:outline-none ">
                            </td>
                            <td class="border border-green-600 ...">
                                <input
                                type="time"
                                name="time"
                                placeholder="Time"
                                class="block shadow-5xl p-2 w-80  focus:outline-none ">
                            </td>
                            <td class="border border-green-600 ...">
                                <input
                                type="file"
                                name="audio"
                                placeholder="Audio"
                                class="block shadow-5xl p-2 w-80  focus:outline-none ">
                            </td>
                          </tr>


                        </tbody>
                      </table>

                      <a  href="" class="chapterlist">Add Row</button>

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
<script>
var counter = 1;
jQuery('a.chapterlist').click(function(event){
    event.preventDefault();
    counter++;
    var newRow = jQuery('<tr><td><input type="text" name="chapter_name class="block shadow-5xl p-2 w-80  focus:outline-none " placeholder="Chapter name'  +
        counter + '"/></td><td><input type="text" name="reader class="block shadow-5xl p-2 w-80  focus:outline-none " placeholder=" Reader'  +
        counter + '"/></td><td><input type="time" name="time class="block shadow-5xl p-2 w-80  focus:outline-none " placeholder=" Time'  +
        counter + '"/></td><td><input type="file" name="audio class="block shadow-5xl p-2 w-80  focus:outline-none " placeholder=" Audio'  +
        counter + '"/></td></tr>');
    jQuery('table.chapterlist').append(newRow);
});
    </script>

