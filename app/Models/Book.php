<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        "title",
        "authors",
        "description",
        "released_at",
        "cover_image",
        "pages",
        "language_code",
        "isbn",
        "in_stock",
    ];

    public function Genres(){
        return $this->belongsToMany(Genre::class, "book_genres");
    }

    public function borrows() {
        return $this->hasMany(Borrow::class, 'book_id');
    }
}
