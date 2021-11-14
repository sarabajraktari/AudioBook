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
            <div class="flex justify-center  ">
                <table class="table-fixed border-collapse w-1/2 ">
                    <tr class="bg-green-100  ">
                        <th class="w-1/4 border-2 border-gray-500">
                                Chapters
                        </th>
                        <th class="w-1/4 border-2 border-gray-500">
                                Duration
                        </th>
                        <th class="w-1/4 border-2 border-gray-500">
                            Voice
                        </th>
                        
                    </tr>

                    @forelse ($book->bookChapter as $bookChapter)
                        <tr>
                            <td class="border-2 border-gray-500">
                                    {{ $bookChapter->chapter_name }}
                            </td>
                            
                        </tr>
                    @empty
                            <td class="border-2 border-gray-500">
                            <p>No book chapters found!</p>
                            <td>
                        @endforelse
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