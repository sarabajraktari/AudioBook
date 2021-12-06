<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlists';
    protected $primaryKey = 'id';
    protected $timestaps = true;

    protected $fillable = ['user_id', 'book_id'];

    public static function countWishlist($book_id)
    {
        $countWishlist = Wishlist::where(['user_id' => Auth::user()->id, 'book_id' => $book_id])->count();
        return $countWishlist;
    }
    // public function book()
    // {
    //     return $this->belongsToMany(book::class);
    // }
    public function book()
    {
        return $this->belongsTo(book::class, 'book_id', 'isbn');
    }
    // public function books()
    // {
    //     return $this->belongsMany(book::class);
    // }
    // public function users()
    // {
    //     return $this->belongsMany(User::class);
    // }
}
