@extends('layouts.app')

@section('content')
<div class="m-auto w-4/5 py-10 ">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                     BOOKS
            </h1>
        </div>



       @if (Auth::user() &&Auth::user()->role==1)

       <div class="flex  justify-between pt-5 pb-10 sm:flex flex-wrap  ">
           <div class=" py-8">

                <form action="/admin/books" method="GET" class="">
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
           </div>

       <div class=" py-10">
        <a
        href="books/create"
       class="border-b-2 px-20 text-lg font-bold normal-case border-dotted italic text-black ">
       Add  a new book &rarr;
        </a>

       </div>
        </div>
        @foreach ($books as $book )


    <div class=" flex   max-w-md  bg-gray-100 rounded-md shadow-md overflow-hidden mb-7 mt-5  md:max-w-5xl ">
                <a href="/admin/books/{{ $book->isbn}}" class="no-underline">
            <div class="md:flex  ">
                <div class="md:flex-shrink-0   ">
                    <img class=" h-1/2 w-full object-contain md:h-full md:w-48" src="{{ asset('images/' . $book->image_path) }}" >
                </div>
                <div class="p-8 flex-shrink w-64 h-30  ">
                    <div class="uuppercase tracking-wide text-m text-indigo-500 font-semibold">
                        Author:{{ $book->author }}
                    </div>
                    <p class="block mt-1 text-lg leading-tight font-medium text-black ">
                            Title: {{ $book ->title }}
                    </p>

                    <p class="text-lg text-gray-700 py-4">
                                        Pages: {{ $book->pages }}
                    </p>
                    </a>

                </div>

    </div>

        <div class="sm:grid  justify-items-end  w-1/2  grid  content-center  mx-auto mr-2 ">
            <div class="">
            <a
             class="border-b-2   border-dotted italic text-green-500 mx-auto"
             href="books/{{ $book->isbn }}/edit">
                Edit &rarr;
            </a>

            </div>
            <div >
                <form action="/admin/books/{{ $book ->isbn }}" class="pt-3" method="POST">
                    @csrf
                    @method('delete')
                    <button
                    type="submit"
                    class="border-b-2  border-dotted italic text-red-500 mx-auto ">
                        Delete &rarr;
                    </button>
                </form>
            </div>

                <div class="mt-2">
                <a
                 class="border-b-2   border-dotted italic text-green-500 mx-auto"
                 href="books/{{ $book->isbn }}/chapter">
                    Addd Chapter &rarr;
                </a>

                </div>

        </div>

    </div>
    @endforeach
           @endif

           <div class="d-flex justify-content-center mb-10 mx-16">
            {!! $books->links() !!}
        </div>
@endsection


