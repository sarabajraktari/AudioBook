@extends('layouts.app')

@section('content')
<div class="bg-white">
    <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
      <form action="/books" method="GET" class="pb-10">
                
        
        <input
            type="text"
            name="search"
            placeholder="Search..."
            class="pl-4 pr-5 mr-3  py-3 border-green-300 border-2 leading-none rounded-md shadow-md focus:outline-none focus:border-transparent">
        
        <button
            type="submit"
            class="bg-green-400 hover:bg-green-300  uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-2xl active:bg-green-400">
            Submit
        </button>
    </form>
            
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
            <p class="text-sm font-medium text-gray-900">Price:${{ $book->price }}</p>
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
   <div class="d-flex justify-content-center">
    {!! $books->links() !!}
    </div>

 
  @endsection