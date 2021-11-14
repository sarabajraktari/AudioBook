<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latestBooks = book::orderBy('created_at', 'DESC')->get();
        $mostPopularBooks = [];
        return view('home')->with([
            "latestBooks" => $latestBooks,
            "mostPopularBooks" => $mostPopularBooks
        ]);
    }
}
