<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\book;
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
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return view('books.myBooks', compact('wishlist'));
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
}
