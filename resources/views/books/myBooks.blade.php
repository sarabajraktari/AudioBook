@extends('layouts.app')
@section('content')

<div class="  flex flex-row m-10 ">

    <div class=" w-full px-10 h-96 overscroll-contain scrollbar scrollbar-thumb-gray-700 scrollbar-track-gray-900 overflow-y-scroll ">

        <h1 class="text-2xl text-gray-800 font-bold leading-none p-5">Wishlist</h1>
        @if($wishlist->count()>0)
            @foreach ($wishlist as $item)
                <div class="max-w-2xl w-full mb-3 wishlist-content ">
                    <input type="hidden" class="wishlist_id" value="{{ $item->id }}">
                    <div class="flex flex-col">
                        <div class="bg-gray-900 border border-gray-900 shadow-lg  rounded-3xl p-2 ">
                            <div class="flex-none sm:flex">
                                <div class=" relative h-28 w-28   sm:mb-0 mb-3">
                                    <img src="{{ asset('images/' . $item->book->image_path) }}"  class=" w-28 h-28 object-contain rounded-3xl">

                                </div>
                        <div class="flex-auto justify-evenly">
                            <div class="flex items-center justify-between sm:mt-2">
                                <div class="flex items-center">
                                    <div class="flex flex-col">
                                        <div class="w-full flex-none text-l text-gray-200 font-bold leading-none">
                                           {{$item->book->title}}
                                        </div>
                                        <div class="flex-auto text-gray-400 my-1">
                                            <span class="mr-3 ">
                                                {{$item->book->author}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="flex pt-2  text-sm text-gray-400">
                                    <p>
                                       Pages: {{$item->book->pages}}
                                    </p>
                                    <button  class="wishlist-remove-btn flex-no-shrink bg-red-600 hover:bg-red-500  mt-5  p-1 text-xs shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-red-300 hover:border-red-500 text-white rounded-full transition ease-in duration-300">REMOVE</button>
                                    <button  class="flex-no-shrink bg-green-600 hover:bg-green-500  mt-5 ml-2 p-1 text-xs shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-green-300 hover:border-green-500 text-white rounded-full transition ease-in duration-300">LISTEN</button>
                                </div>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        @else
            <h4 class="text-2xl text-gray-800 font-bold leading-none p-5">There are no books in your Wishlists</h4>
        @endif

    </div>
    <div class="border-4 border-black w-full p-10 h-full ">
        2 Listening

    </div>
    <div class="border-4 border-black w-full p-10 h-full" >
        3 Done
    </div>
  </div>

@endsection
@push('javascript')
  <script>
      $(document).ready(function(){
      $('.wishlist-remove-btn').click(function(e){
        e.preventDefault();
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var Clickedthis=$(this);
            var wishlist_id =$(Clickedthis).closest('.wishlist-content').find('.wishlist_id').val();
            // alert(wishlist_id);
            $.ajax({
                method: "POST",
                url: "/remove-from-wishlist",
                data: {
                    'wishlist_id':wishlist_id
                },

                success: function (response) {
                    $(Clickedthis).closest('.wishlist-content').remove();

                        alert.success(response.status);
                }
            });
      });
    });

  </script>

@endpush
