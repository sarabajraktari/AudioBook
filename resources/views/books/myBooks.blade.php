@extends('layouts.app')
@section('content')
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
{{-- <style>
/* .modal-open{
    padding: 8px 16px;
    background: royalblue;
    color:white;
    border-radius: 4px;
    outline: none;
    border:none;
    margin-bottom: 3;
} */
.modal{
    position:fixed;
    top:0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    z-index: 2;
    display: none;
    animation: modal-open .5s;
}
.modal-content{
    background: #fff;
    margin-top: 100px;
    width: 50%;
    margin-left:auto;
    margin-right: auto;
    padding: 8px 24px;
    border-radius:4px;
    z-index: 4;
}
.modal-header{
    font-weight: 500;
    padding: 10px 0;
    font-size: 26px;

}
.modal-header .modal-close{
    float: right;
    font-size:20px;
    background: #efefef;
    border:0;
    outline: 0;
    padding: 5px 8px;
    border-radius:50%;
}
.modal-body{
    color:#7b7b7b;
    padding: 15px 0;
    width:auto;
    height: auto;
}
.modal-footer{
    padding: 15px 0;

}
.modal-footer .modal-close{
    padding: 8px 16px;
    font-size: 14px;
    border:none;
    outline: none;
    border-radius: 4px;
    color:#1a73e8;

}
@keyframes modal-open{
    from{
        opacity:0;
    }
    to{
        opacity: 1;
    }
}
</style> --}}
<style>
    .wishlist{
        height: 700px;
        overflow: auto;
        border-radius:10px;
    }
    .booklist{
        height: 700px;
        overflow: auto;

    }
</style>
<div class="  flex flex-row m-10 ">

    <div class="wishlist w-full px-10 s overscroll-contain scrollbar scrollbar-thumb-gray-700 scrollbar-track-gray-900 overflow-y-scroll ">

        <h1 class="text-2xl text-gray-800 font-bold leading-none p-5">Wishlist</h1>


        @if($wishlist->count()>0 )
            @foreach ($wishlist as $item)
                <div class="max-w-2xl w-full mb-3 wishlist-content ">
                    <input type="hidden" class="wishlist_id" value="{{ $item->id }}">
                    <div class="flex flex-col">
                        <div class="bg-gray-900 border border-gray-900 shadow-lg  rounded-3xl p-2 ">
                            <div class="flex-none sm:flex">
                                <div class=" relative h-32 w-32   sm:mb-0 mt-2">
                                    <img src="{{ asset('images/' . $item->book->image_path) }}"  class=" w-32 h-32 object-contain rounded-3xl">

                                </div>
                        <div class="flex-auto justify-between">
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
                                </div>
                                <div class="float-right flex pt-2  text-sm text-gray-400">
                                    <button  class="wishlist-remove-btn flex-no-shrink bg-red-600 hover:bg-red-500  mt-5  p-1 text-xs shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-red-300 hover:border-red-500 text-white rounded-full transition ease-in duration-300">REMOVE</button>
                                    <a href="mybooks/{{ $item->book->isbn }}">
                                    <button  data-modal="{{ $item->id }}" class="modal-open flex-no-shrink bg-green-600 hover:bg-green-500  mt-5 ml-2 p-1 text-xs shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-green-300 hover:border-green-500 text-white rounded-full transition ease-in duration-300">LISTEN</button>
                                    </a>
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

    <div class="booklist  w-full px-10 h-96 overscroll-contain scrollbar scrollbar-thumb-gray-700 scrollbar-track-gray-900 overflow-y-scroll ">
        <h1 class="text-2xl text-gray-800 font-bold leading-none p-5">Playlist</h1>
        @if($mybookList->count()>0)
            @foreach ($mybookList as $item)
                <div class="max-w-2xl w-full mb-3 wishlist-content ">
                    <input type="hidden" class="wishlist_id" value="{{ $item->id }}">
                    <div class="flex flex-col">
                        <div class="bg-gray-900 border border-gray-900 shadow-lg  rounded-3xl p-2 ">
                            <div class="flex-none sm:flex">
                                <div class=" relative h-32 w-32   sm:mb-0 mb-3">
                                    <img src="{{ asset('images/' . $item->book->image_path) }}"  class=" w-32 h-32 object-contain rounded-3xl">

                                </div>
                        <div class="flex-auto justify-between">
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
                                </div>
                                <div class="float-right flex pt-2  text-sm text-gray-400">
                                    <a href="mybooks/{{ $item->book->isbn }}">
                                        <button  data-modal="{{ $item->id }}" class="modal-open flex-no-shrink bg-green-600 hover:bg-green-500  mt-5 ml-2 p-1 text-xs shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-green-300 hover:border-green-500 text-white rounded-full transition ease-in duration-300">LISTEN</button>
                                        </a>
                                </div>


                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        @else
            <h4 class="text-2xl text-gray-800 font-bold leading-none p-5">There are no books in your Playlist</h4>
        @endif




    </div>

  </div>

@endsection
<!--Remove button-->
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

<!--Listen button-->
@push('javascript')
<script>
// getting modal opening buttons

var modalBtns = document.querySelectorAll('.modal-open');

modalBtns.forEach(function(btn){
    btn.onclick= function(){
        var modal =btn.getAttribute('data-modal');

        document.getElementById(modal).style.display="block";

    };
});

var closeBtns=document.querySelectorAll('.modal-close');

closeBtns.forEach(function(btn){
    btn.onclick= function(){
        var modal =btn.closest('.modal').style.display='none';

    };
});
window.onclick = function(e){
            if(e.target.classList.contains('modal')){
                e.target.style.display = 'none';
            }
        };



</script>
@endpush
