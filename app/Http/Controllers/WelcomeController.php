<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\BookChapter;
use Illuminate\Http\Request;
use App\Models\User;

class WelcomeController extends Controller
{
    public function index()
    {
        $latestBooks = book::orderBy('created_at', 'desc')->take(15)->get();
        $mostPopularBooks = book::orderBy('created_at', 'asc')->take(15)->get();
        $countCostumer = User::where('role', 2)->count();
        $sumTime = BookChapter::sum('time');




        return view('welcome')->with([
            "latestBooks" => $latestBooks,
            "mostPopularBooks" => $mostPopularBooks,
            "countCostumer" => $countCostumer,
            "sumTime" => $sumTime
            // "costumers" => $costumers
        ]);
    }
}
