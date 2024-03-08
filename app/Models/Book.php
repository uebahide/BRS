<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
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
        return $this->belongsToMany(Genre::class);
    }
}
