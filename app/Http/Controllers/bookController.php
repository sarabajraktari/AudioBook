<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;
use App\Rules\Uppercase;
use App\Models\User;
use Symfony\Component\VarDumper\Caster\RedisCaster;

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
        //     $request->image->extension();

        // $request->image->move(public_path('images'), $newImageName);
        $request->validate([
            'title' => 'required',
            'author' => 'required|string',
            'pages' => 'required|integer|min:0|max:2000',
            'description' => 'required|',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',

        ]);

        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        //if it's valid ,it will proceed


        $book = book::create([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'description' => $request->input('description'),
            'pages' => $request->input('pages'),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id,
            'price' => $request->input('price'),


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


    //     public function search()
    //     {
    //         $search_text = $_GET['search'];
    //         $books = book::where('title', 'LIKE', '%' . $search_text . '%')->get();
    //         return view('books.search', compact('books'));
    //     }
}
