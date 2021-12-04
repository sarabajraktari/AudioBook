@extends('layouts.app')

@section('content')



<body>

    <div class="container">
        <br>
        @if(Session::has('success'))

            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
    <form action="/admin/books/{{ $book->isbn }}/chapter" enctype="multipart/form-data" method="POST">
       @csrf

        <section>
            <div class="panel panel-header text-center">
                <h1>ADD CHAPTER </h1>
            </div>

            <div class="panel panel-footer" >
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>ISBN</th>
                        <th>Chapter Name</th>
                        <th>Reader</th>
                        <th>Time</th>
                        <th>Audio</th>
                        <th><a href="#" class="addRow"><i class="glyphicon glyphicon-plus"></i></a></th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $book->isbn }}</td>
                        <td><input type="text" name="chapter_name[]" class="form-control" required=""></td>
                        <td><input type="text" name="reader[]" class="form-control"></td>
                        <td><input type="text" name="time[]" class="form-control time" required=""></td>
                        <td><input type="file" name="audio_path[]" class="form-control audio"></td>
                        <td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>
                    </tr>

                    </tbody>
                        <tfoot>
                            <tr>
                                <td style="border: none"></td>
                                <td style="border: none"></td>
                                <td style="border: none"></td>
                                <td></td>
                                <td><b class="total"></b> </td>
                                <td><input type="submit" name="" value="Submit" class="btn btn-success"></td>
                            </tr>
                        </tfoot>
                    </table>
            </div>
        </section>
    </form>
    </div>
    <script type="text/javascript">

        $('.addRow').on('click',function(){
            addRow();
        });
        function addRow()
        {
            var tr='<tr>'+
            '<td> {{ $book->isbn }}</td>'+
            '<td><input type="text" name="chapter_name[]" class="form-control" required=""></td>'+
            '<td><input type="text" name="reader[]" class="form-control"></td>'+
            '<td><input type="text" name="time[]" class="form-control time" required=""></td>'+
            '<td><input type="file" name="audio_path[]" class="form-control audio" ></td>'+
            '<td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>'+
            '</tr>';
            $('tbody').append(tr);
        };
        $('.remove').live('click',function(){
            var last=$('tbody tr').length;
            if(last==1){
                alert("you can not remove last row");
            }
            else{
                $(this).parent().parent().remove();
            }

        });
    </script>
</body>
@endsection




<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
