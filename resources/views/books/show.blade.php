@extends('layouts.app')

@section('content')
<section class="text-gray-700 body-font overflow-hidden bg-white">
    <div class="container px-5 py-20 mx-auto">
      <div class="lg:w-4/5 mx-auto flex flex-wrap ">

        <img  class="lg:w-1/2 w-full  object-contain object-center rounded border border-gray-200" src="{{ asset('images/' . $book->image_path) }}">

        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
          <h2 class="text-sm title-font text-gray-500 tracking-widest">{{ $book->author }}</h2>
          <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $book->title }}</h1>
          <div class="flex mb-4">
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
            </span>
            <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200">
              <a class="text-gray-500">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                </svg>
              </a>
              <a class="ml-2 text-gray-500">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                </svg>
              </a>
              <a class="ml-2 text-gray-500">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                </svg>
              </a>
            </span>
          </div>
          <p class="leading-relaxed">{{ $book->description }}</p>




          <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
            <div class="flex">
              <span class="mr-3">Pages: {{ $book->pages }}</span>

            </div>

            <div class="flex ml-6 items-center">

              <div class="relative">

                {{-- <span class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center"> --}}
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">

                  </svg>
                </span>
              </div>
            </div>
          </div>
          <div class="flex">
            {{-- <span class="title-font font-medium text-2xl text-gray-900">${{ $book->price }}.00</span> --}}
            <a href="#" class="update_wishlist" data-bookid="{{ $book->isbn }}">
            <button class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">Add wish list</button>
            <i class="fas fa-heart fa-3x"></i>
            </a>
          </div>
          <div class="shadow overflow-hidden rounded border-b border-gray-200 mt-10 ">
            <table class="min-w-full bg-white ">
                <thead class="bg-gray-800 text-white">
                <tr >
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">
                            Chapter Name
                    </th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">
                            Reader
                    </th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">
                        Time
                    </th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">
                        Audio
                    </th>

                </tr>
            </thead>

                @forelse ($book->bookChapter as $bookChapter)
                <tbody class="text-gray-700">
                    <tr>
                        <td class="w-1/3 text-left py-3 px-4">
                                {{ $bookChapter->chapter_name }}
                        </td>
                        <td class="w-1/3 text-left py-3 px-4">
                            {{ $bookChapter->reader }}
                    </td>
                    <td class="w-1/3 text-left py-3 px-4">
                        {{ $bookChapter->time }}
                </td>
                <td class="w-1/3 text-left py-3 px-4">

                    <audio controls
                     src="{{ asset('audio/' . $bookChapter->audio_path) }}" type="audio/mp3">
                    </audio>
            </td>

                    </tr>

                @empty
                        <td class="w-1/3 text-left py-3 px-4">
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
      </div>

      </div>
    </div>

  </section>
@endsection

@push('javascript')
    <script>
        var user_id="{{ Auth::id() }}";

        $(document).ready(function(){
            $('.update_wishlist').click(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var book_id=$(this).data('bookid');
            $.ajax({
                    type:'POST',
                    url:'/update_wishlist',
                    data:{
                        book_id:book_id,
                        user_id:user_id
                    },
                    success:function(response){
                       if(response.action == 'add'){
                        $('#notifDiv').fadeIn();
                        $('#notifDiv').css('background', 'green');
                        $('#notifDiv').text(response.message);
                        setTimeout(() => {
                            $('#notifDiv').fadeOut();
                        }, 3000);
                       }
                       else if(response.action=='remove'){
                        $('#notifDiv').fadeIn();
                        $('#notifDiv').css('background', 'red');
                        $('#notifDiv').text(response.message);
                        setTimeout(() => {
                            $('#notifDiv').fadeOut();
                        }, 3000);
                       }
                    }
                });
            });
        });
    </script>
@endpush
