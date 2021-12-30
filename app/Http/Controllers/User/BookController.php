<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\book;
use App\Models\BookUser;
use App\Models\ListBook;
use App\Models\User;
use App\Models\Wishlist;
use Error;
use Faker\Calculator\Isbn;
use Illuminate\Support\Facades\Auth;

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


    public function mybooks()
    {
        $mybookList = ListBook::where('user_id', Auth::id())->get();
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        // $bookChapter = Wishlist::where('book_id');

        return view('books.myBooks', compact('wishlist', 'mybookList'));
    }

    public function removeWishlist(Request $request)
    {
        $wishlist_id = $request->wishlist_id;

        if (Wishlist::where('user_id', Auth::id())->where('id', $wishlist_id)->exists()) {
            $wishlist = Wishlist::where('user_id', Auth::id())->where('id', $wishlist_id);
            $wishlist->delete();
            return response()->json(['status' => 'Item Removed from Wishlist']);
        } else {

            return response()->json(['status' => 'No Items Found in Wishlist']);
        }
    }

    public function showBook($id)
    {
        $book = book::find($id);
        return view('books.book')->with('book', $book);
    }

    public function addBookList(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            $countBookList = ListBook::countBookList($data['book_id']);

            $listbook = new ListBook;

            if ($countBookList == 0) {
                $listbook->book_id = $data['book_id'];
                $listbook->user_id = $data['user_id'];
                $listbook->save();

                return response()->json(['action' => 'add', 'message' =>
                'Book Added Successfully to Wishlist']);
            } else {
                ListBook::where(['user_id' => Auth::user()->id, 'book_id' =>
                $data['book_id']])->delete();


                return response()->json(['action' => 'remove', 'message' =>
                'Book Removed  Successfully from Wishlist']);
            }
        }
    }
}
