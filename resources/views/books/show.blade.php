@extends('layouts.app')

@section('content')
    <div class="m-auto w-full ">
        <div class="  mt-5  sm:flex    mx-auto  border-b border-gray-200 w-4/5">
         <div class="mx-auto p-5 w-1/2">
                <img 
                    src="{{ asset('images/' . $book->image_path) }}"
                    class="w-full h-full object-center object-contain lg:w-full lg:h-full  "
                       alt="">
         </div>
            <div class="p-5   " > 
                <h1 class=" text-gray-700 font-bold text-2xl  ">
                TITLE: {{ $book->title }}
                </h1>
                <span class="uppercase text-blue-500 font-bold text-xs italic">
                        Author:{{ $book->author }}
                </span>
                 <p class="text-xl text-gray-700 pt-8 pb- leading-8 font-light">
                        Description: {{ $book->description }}
                </p> 
                {{-- <p>
                    {!! str_limit(($book->description), 150, '') !!}
                    @if (strlen($book->description) > 250)
                        <span id="dots">...</span>
                        <span id="more" style="display:none;">{{ substr( $book->description,200) }}</span>
                        
                    @endif
        
                    
                    
                    </p>
                    <button class="btn btn-primary btn-small" onclick="myFunction()" id="myBtn">Read more</button> --}}
        
                
                <p class="text-lg italic text-gray-700 py-15 pt-10">
                    Pages: {{ $book->pages }}
                </p>
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
            <div class="grid justify-center  mt-5">
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
{{--     
    <script type="text/javascript">
        function myFunction() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("myBtn");
        
            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Read more";
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "Read less";
                moreText.style.display = "none";
            }
        }
        </script> --}}
@endsection