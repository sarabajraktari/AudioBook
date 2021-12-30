@extends('layouts.app')
@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/audio.css') }}">
</head>
 <div class="shadow overflow-hidden rounded border-b border-gray-200 mt-5 p-20 ">
    <table class="min-w-full bg-white  ">
        <thead class="bg-gray-600 text-white ">
        <tr class="">
            <th class="w-1/3 text-left py-3 px-4 uppercase  text-m font-mono">
                    Chapter Name
            </th>
            <th class="w-1/3 text-left py-3 px-4 uppercase  text-m font-mono">
                    Reader
            </th>
            <th class="text-left py-3 px-4 uppercase  text-m font-mono">
                Time
            </th>
            <th class="text-left py-3 px-4 uppercase text-m font-mono">
                Audio
            </th>

        </tr>
        </thead>

        @forelse ($book->bookChapter as $bookChapter)
        <tbody class="text-gray-700 border-b-2 border-gray-600 text-xl font-mono">
            <tr>
                <td class="w-1/3 text-left py-9 px-4">
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


      <div class="button flex items-center float-right  ">
        <a href="#" class="add_bookList" data-bookid="{{ $book->isbn }}">
        <button  class=" flex-no-shrink bg-gray-600 hover:bg-gray-500  mt-5 ml-2 py-4 px-7 text-xs shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-gray-300 hover:border-gray-500 text-white rounded-full transition ease-in duration-300">Add To Playlist</button>
        </a>
    </div>
    <div id="notifDiv" class="  rounded mt-3 text-black text-center opacity-90 py-2"></div>
</div>




@endsection
@push('javascript')
    <script>
        var user_id="{{ Auth::id() }}";

        $(document).ready(function(){
            $('.add_bookList').click(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // alert(id);

             var book_id=$(this).data('bookid');
            //  alert(isbn);

            $.ajax({
                    type:'POST',
                    url:'/add_book_list',
                    data:{
                        book_id:book_id,
                        user_id:user_id
                    },
                    success:function(response){
                       if(response.action == 'add'){
                           $('a[data-bookid='+book_id+']').html(
                            ' <button  class=" flex-no-shrink bg-green-600 hover:bg-green-500  mt-5 ml-2 py-3 px-5 text-xs shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-green-300 hover:border-green-500 text-white rounded-full transition ease-in duration-300">Added</button>'
                           );
                        $('#notifDiv').fadeIn();
                        $('#notifDiv').css('background', 'green');
                        $('#notifDiv').text(response.message);
                        setTimeout(() => {
                            $('#notifDiv').fadeOut();
                        }, 3000);
                       }
                       else if(response.action=='remove'){
                        $('a[data-bookid='+book_id+']').html(
                            ' <button  class=" flex-no-shrink bg-green-600 hover:bg-green-500  mt-5 ml-2 py-3 px-5 text-xs shadow-sm hover:shadow-lg font-medium tracking-wider border-2 border-green-300 hover:border-green-500 text-white rounded-full transition ease-in duration-300">Add To Playlist</button>'
                           );
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
@push('javascript')

<script>

    </script>



@endpush
