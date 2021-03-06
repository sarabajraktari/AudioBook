<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookChapter extends Model
{
    use HasFactory;


    protected $table = 'book_chapter';

    protected $primaryKey = 'id';
    protected $fillable = ['book_isbn', 'chapter_name', 'reader', 'time', 'audio_path'];

    //A car model belongs to a car
    public function book()
    {
        return $this->belongsTo(book::class);
    }
}
