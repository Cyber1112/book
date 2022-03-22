<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'rating',
    ];

    public function genres() {
        return $this->belongsToMany(Genres::class, 'book__genres', 'book_id', 'genre_id');
    }

    public function authors() {
        return $this->belongsToMany(Authors::class, 'book_authors', 'book_id', 'author_id');
    }

    //  Get the comments for the book
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
}
