@extends('layouts.app')

@section('content')
<div class="m-auto w-4/5 py-10">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                     BOOKS
            </h1>
        </div>

     
     
       @if (Auth::user() &&Auth::user()->role==1)
       
       <div class="flex  justify-between pt-5 pb-10 sm:flex flex-wrap  ">
           <div class=" py-5">
        <a 
             href="book/create" 
            class="border-b-2 pb-2 text-lg font-bold normal-case border-dotted italic text-green-300 ">
            Add  a new book &rarr;
        </a>
           </div>
       <div class=" py-3">
            <form action="/search" method="GET" class="">
                @csrf
        
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
       </div>
        </div>
        @foreach ($books as $book )
               
  
    <div class=" flex   max-w-md  bg-gray-100 rounded-md shadow-md overflow-hidden mb-7 mt-5  md:max-w-5xl ">
                <a href="/book/{{ $book->isbn}}" class="no-underline">
            <div class="md:flex  ">
                <div class="md:flex-shrink-0   ">
                    <img class=" h-48 w-full object-cover md:h-full md:w-48" src="{{ asset('images/' . $book->image_path) }}" >
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
             href="book/{{ $book->isbn }}/edit">
                Edit &rarr;
            </a>
            
            </div>
            <div >
                <form action="/book/{{ $book ->isbn }}" class="pt-3" method="POST">
                    @csrf
                    @method('delete')
                    <button
                    type="submit"
                    class="border-b-2  border-dotted italic text-red-500 mx-auto ">
                        Delete &rarr;
                    </button>
                </form>
            </div>

        </div>
      
    </div>
    @endforeach
           @endif

           <div class="d-flex justify-content-center">
            {!! $books->links() !!}
        </div>
@endsection


