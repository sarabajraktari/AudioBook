<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Wishlist extends Model
{
    use HasFactory;
    public static function countWishlist($book_id)
    {
        $countWishlist = Wishlist::where(['user_id' => Auth::user()->id, 'book_id' => $book_id])->count();
        return $countWishlist;
    }
}
