@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/5 py-24 relative">
        <div class="text-center ">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-60 float-left ml-10 " fill="none" viewBox="0 0 24 24" stroke="currentColor"> 
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
            <h1 class="text-3xl uppercase bold">
                {{ $user->name }}
            </h1>
    </div>

        <div class=" py-10 text-center">

                 <div class="m-auto">
 
                 <span class="uppercase text-blue-500 font-bold text-xs italic">
                     ID:{{ $user->id }}
                 </span>

                 <p class="text-lg text-gray-700 py-8">
                     Email: {{ $user->email }}
                 </p>

                <p>
                    Created at: {{ $user->created_at }}
                </p>
                 <hr class="mt-4 mb-8" >
            
             
             </div>
           </div>
    </div>
@endsection