@extends('layouts.app')

@section('content')
    <div class="m-auto w-full py-0">
        <div class=" sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
            <div class="sm:w-full h-full ">
                <img 
                    src="{{ asset('images/' . $book->image_path) }}"
                    class=" ml-1/6 h-full w-1/2     rounded-xl "
                    alt="">
            </div>
            <div class="p-8 flex-shrink w-64 h-30  ml-10" >
                <h1 class=" text-gray-700 font-bold text-2xl  ">
                TITLE: {{ $book->title }}
                </h1>
                <span class="uppercase text-blue-500 font-bold text-xs italic">
                        Author:{{ $book->author }}
                </span>
                <p class="text-xl text-gray-700 pt-8 pb- leading-8 font-light">
                        Description: {{ $book->description }}
                </p>
                <p class="text-lg italic text-gray-700 py-15">
                    Pages: {{ $book->pages }}
                </p>
            </div>
        </div>
            <div class="flex justify-center  mt-10 ">
                <table class="min-w-20 divide-y divide-gray-200 ">
                    <tr class="bg-green-300  ">
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Chapters
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Duration
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Voice
                        </th>
                  
                    </tr>

                    @forelse ($book->bookChapter as $bookChapter)
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $bookChapter->chapter_name }}
                            </td>
                            
                        </tr>
                   
                    @empty
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <p>No book chapters found!</p>
                            <td>
                    @endforelse
                    </tbody>
                    </table>
                </div>  
                    {{-- <p class="text-left">
                        Product types:
                        @forelse ( $car->products as $product)
                            {{ $product->name }}
                        @empty
                            <p>
                                No car product description
                            </p>
                        @endforelse
                    </p> --}}

                    {{-- <hr class="mt-4 mb-8" > --}}
                
                
             
    </div>
@endsection