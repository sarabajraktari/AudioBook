<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\book;

class BookController extends Controller
{
    public function index()
    {

        $search_text = isset($_GET['search']) ? $_GET['search'] : null;
        if ($search_text)
            $books = book::where('title', 'LIKE', '%' . $search_text . '%')->paginate(8);
        else
            $books = book::paginate(8);

        return view('books.indexUser', [
            'books' => $books,

        ]);
    }
}
