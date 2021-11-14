<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\book;

class BookController extends Controller
{
    public function index()
    {
        // $search =  $_GET['search'];
        // return $search;
        $books = book::paginate(8);

        return view('books.indexUser', [
            'books' => $books,

        ]);
    }
}
