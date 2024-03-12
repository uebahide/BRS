<?php 

namespace App\Services;
use InterventionImage;
use Illuminate\Support\Facades\Storage;
use App\Models\Borrow;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class BookService{

  public static function availableCount(Book $book)
  {
    $available_count = $book->in_stock;

    foreach($book->borrows as $borrows)
    {
        if($borrows->status == "ACCEPTED" || $borrows->status == "PENDING" || $borrows->status == "RETURNING")
        {
            $available_count--;
        }
    }

    return $available_count;
  }

}

?>