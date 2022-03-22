<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_id',
        'comments',
    ];

    // Get the book that owns the comments
    public function article()
    {
        return $this->belongsTo(Post::class);
    }
}
