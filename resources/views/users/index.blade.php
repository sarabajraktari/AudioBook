@extends('layouts.app')

@section('content')
<div class="m-auto w-4/5 py-10">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold mb-10">
                     USERS
            </h1>
        </div>
        <div class="flex  justify-between pt-10 pb-10 sm:flex flex-wrap ">




                        <form action="/user" method="GET">
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

        <div class=" flex-grow w-16 h-30 grid place-items-center content-center mr-10 sm:flex-wrap ">
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
     <div class="d-flex justify-content-center mb-10 mx-16">
         {!! $users->links() !!}
     </div>
</div>


@endsection


