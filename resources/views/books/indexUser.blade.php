@extends('layouts.app')

@section('content')
<div class="bg-white">
    <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
      <form action="/books" method="GET" class="pb-10">
        <div class="relative text-gray-600 focus-within:text-gray-400">
         <span class="absolute inset-y-0 left-0 flex items-center pl-2">
            <button
                type="submit"
                class="p-1 focus:outline-none focus:shadow-outline">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </button>
         </span>
            <input
            type="text"
            name="search"
            placeholder="Search..."
            class="pl-4 pr-5 mr-3  py-3 border-black border-2 leading-none rounded-md shadow-md  bg-gray-100 rounded-md pl-10 focus:outline-none focus:bg-white focus:text-gray-900" placeholder="Search...">
      </form>
    </div>

        <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            @foreach ($books as $book)
                <div class="group relative">

          <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">




            <img src="{{ asset('images/' . $book->image_path) }}"   class="w-full h-full object-center object-contain lg:w-full lg:h-full">
          </div>
          <div class="mt-4 flex justify-between">
            <div>
              <h3 class="text-sm text-gray-700">
                <a href="admin/books/{{ $book->isbn}}">
                  <span aria-hidden="true" class="absolute inset-0"></span>
                  Title:{{ $book->author }}
                </a>
              </h3>
              <p class="mt-1 text-sm text-gray-500">   Author:{{ $book->author }}</p>
            </div>
            <div>
            {{-- <p class="text-sm font-medium text-gray-900">Price:${{ $book->price }}</p> --}}
            <ul class="flex justify-right">
              <li>
                <i class="fas fa-star fa-sm text-yellow-500 mr-1"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-yellow-500 mr-1"></i>
              </li>
              <li>
                <i class="fas fa-star fa-sm text-yellow-500 mr-1"></i>
              </li>
              <li>
                <i class="far fa-star fa-sm text-yellow-500 mr-1"></i>
              </li>
              <li>
                <i class="far fa-star fa-sm text-yellow-500 mr-1"></i>
              </li>
            </ul>
            </div>
          </div>

        </div>
        @endforeach
        <!-- More products... -->
      </div>
    </div>
  </div>
   <div class="d-flex justify-content-center mb-10 mx-16">
    {!! $books->links() !!}
    </div>
{{-- <div class="flex">
 <div id="starRating">
 </div>
</div>
 <script src="{{ mix('js/app.js') }}">
   </script> --}}
  @endsection

