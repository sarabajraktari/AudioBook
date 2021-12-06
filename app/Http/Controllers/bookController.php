<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;
use App\Rules\Uppercase;
use App\Models\User;
use Symfony\Component\VarDumper\Caster\RedisCaster;
use App\Models\Wishlist;
use App\Models\BookChapter;
use Illuminate\Support\Facades\Auth;

class bookController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $search_text = isset($_GET['search']) ? $_GET['search'] : null;
        if ($search_text)
            $books = book::where('title', 'LIKE', '%' . $search_text . '%')->paginate(5);
        else
            $books = book::paginate(5);
        return view('books.index', [
            'books' => $books,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required|string',
            'pages' => 'required|integer|min:0|max:2000',
            'description' => 'required|',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',

        ]);


        //if it's valid ,it will proceed

        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        $book = book::create([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'description' => $request->input('description'),
            'pages' => $request->input('pages'),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/admin/books'); //kur klikohet buttoni me orientu ne faqen book
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = book::find($id);

        return view('books.show')->with('book', $book);

        // var_dump($book->user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($isbn)
    {
        $book = book::find($isbn);

        return view('books.edit')->with('book', $book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $isbn)
    {

        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'pages' => 'required|integer|min:0|max:2000',
            'description' => 'required|string',


        ]);
        $books = book::where('isbn', $isbn)
            ->update([
                'title' => $request->input('title'),
                'author' => $request->input('author'),
                'pages' => $request->input('pages'),
                'description' => $request->input('description'),


            ]);

        return redirect('/admin/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(book $book)
    {

        $book->delete();

        return redirect('/admin/books');
    }


    // public function mybooks()
    // {

    //     $books_user = Wishlist::all();

    //     return view(
    //         'user.myBooks',
    //         ['books_user' => $books_user]
    //     );
    // }
    public function bookChapter($isbn)
    {
        $book = book::find($isbn);

        return view('books.chapters')->with('book', $book);
    }
    public function AddbookChapter(Request $request, $isbn)
    {


        $data = $request->all();

        // dd($request->audio_path);

        if (count($request->chapter_name) > 0) {
            foreach ($request->chapter_name as $item => $v) {
                $newAudioName = time() . '-' . '.' . $request->audio_path[$item]->extension();
                $request->audio_path[$item]->move(public_path('audio'), $newAudioName);
                $data2 = array(
                    'book_isbn' =>  $isbn,
                    'chapter_name' => $request->chapter_name[$item],
                    'reader' => $request->reader[$item],
                    'time' => $request->time[$item],
                    'audio_path' =>  $newAudioName,

                );
                BookChapter::insert($data2);
            }
        }

        return redirect()->back()->with('success', 'data insert successfully');
    }

    public function updateWishlist(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            $countWishlist = Wishlist::countWishlist($data['book_id']);

            $wishlist = new Wishlist;

            if ($countWishlist == 0) {
                $wishlist->book_id = $data['book_id'];
                $wishlist->user_id = $data['user_id'];
                $wishlist->save();

                return response()->json(['action' => 'add', 'message' =>
                'Book Added Successfully to Wishlist']);
            } else {
                Wishlist::where(['user_id' => Auth::user()->id, 'book_id' =>
                $data['book_id']])->delete();


                return response()->json(['action' => 'remove', 'message' =>
                'Book Removed  Successfully from Wishlist']);
            }
        }
    }
}
