<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'surname',
    ];

    public function searchBookByAuthor(){
        return $this->belongsToMany(Book::class, 'book_authors', 'author_id', 'book_id');
    }
}
