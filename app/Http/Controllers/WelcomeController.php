<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;
use App\Models\User;

class WelcomeController extends Controller
{
    public function index()
    {
        $latestBooks = book::orderBy('created_at', 'desc')->take(15)->get();
        $mostPopularBooks = book::orderBy('created_at', 'asc')->take(15)->get();
        // $costumers = User::where('role', '=', 1)->get();

        return view('welcome')->with([
            "latestBooks" => $latestBooks,
            "mostPopularBooks" => $mostPopularBooks,
            // "costumers" => $costumers
        ]);
    }
}
