@extends('layouts.app')

@section('content')
<div class="m-auto w-4/5 py-10">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold mb-10">
                     USERS
            </h1>
        </div>
        <div class="flex  justify-between pt-5 pb-10 sm:flex flex-wrap  ">
            <div class=" py-5 ml-5">
            <a 
            
                 href="/user" 
                class="border-b-2 pb-2 text-lg font-bold normal-case border-dotted italic text-green-300  ">
                &larr; Back
              
            </a>
            </div>
            
            <div class=" py-3">
                <form action="/search" method="GET">
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
        
        @foreach ($users as $user )
               
             @if (Auth::user() &&Auth::user()->role==1)
               
    <div class=" flex max-w-md  bg-gray-100 rounded-md shadow-md overflow-hidden mb-7  md:max-w-6xl">
                <a href="/user/{{ $user->id}}" class="no-underline">
        <div class="md:flex ">
                <div class="md:flex-shrink-0 flex-1  ">
                 <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mt-6 md:h-40 md:w-40 object-cover" fill="none" viewBox="0 0 24 24" stroke="currentColor"> 
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                      </svg>
                  
                </div> 
            <div class="p-8 flex-shrink w-64 h-30 ">
                <div class="uppercase tracking-wide text-m text-indigo-500 font-semibold">
                    ID:{{ $user->id }}
                </div>
                    <p class="block mt-1 text-lg leading-tight font-medium text-black " >    
                        Name: {{ $user ->name }}
                    </p>
                            
                    <p class="text-lg text-gray-700 py-4">
                                    Email: {{ $user->email }}
                    </p>
                </a>
            </div>
        </div>
                
        <div class=" flex-grow w-16 h-30 grid place-items-center content-center mr-10 md:auto-rows-min ">
            <div class="justify-self-end md:auto-rows-min">
            <a 
             class="border-b-2   border-dotted italic text-green-500"
             href="user/{{ $user->id }}/edit">
                Edit &rarr;
            </a>
            
            </div>
            <div  class="justify-self-end">
            <form action="/user/{{ $user ->id }}" class="pt-3" method="POST">
                @csrf
                @method('delete')
                <button
                 type="submit"
                class="border-b-2  border-dotted italic text-red-500">
                     Delete &rarr;
                </button>
            </form>
            </div>
        </div>
    </div>
        @endif

           @endforeach
</div>
    

@endsection


