<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrow extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'reader_id',
        'book_id',
        'status',
        'request_processed_at',
        'request_managed_by',
        'deadline',
        'returned_at',
        'return_managed_by',
    ];

    public function book() {
        return $this->belongsTo(Book::class, 'book_id');
    }
    public function user() {
        return $this->belongsTo(User::class, 'reader_id');
    }
    public function librarian_request_managed(){
        return $this->belongsTo(Librarian::class, 'request_managed_by');
    }
    public function librarian_return_managed(){
        return $this->belongsTo(Librarian::class, 'return_managed_by');
    }
}
