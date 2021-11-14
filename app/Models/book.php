<?php

namespace App\Models;

use Faker\Calculator\Isbn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $primaryKey = 'isbn';
    protected $timestaps = true;

    protected $fillable = ['title', 'author', 'pages', 'image_path', 'user_id', 'description', 'price'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function bookChapter()
    {
        return $this->hasMany(BookChapter::class);
    }
}
