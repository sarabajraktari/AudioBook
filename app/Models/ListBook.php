<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ListBook extends Model
{
    use HasFactory;

    protected $table = 'list_books';
    protected $primaryKey = 'id';
    protected $timestaps = true;

    protected $fillable = ['user_id', 'book_id'];

    public static function countBookList($book_id)
    {
        $countBookList = ListBook::where(['user_id' => Auth::user()->id, 'book_id' => $book_id])->count();
        return $countBookList;
    }
    public function book()
    {
        return $this->belongsTo(book::class, 'book_id', 'isbn');
    }
}
