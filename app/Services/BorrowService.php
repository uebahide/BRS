<?php 

namespace App\Services;
use InterventionImage;
use Illuminate\Support\Facades\Storage;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class BorrowService{

  public static function isOnGoingRental(Book $book)
  {
    foreach ($book->borrows as $borrow)
    {
        if ($borrow->user->id == Auth::id() && ($borrow->status == "PENDING" || $borrow->status == "ACCEPTED"))
        {
            return true;
        }
    }
    return false;
  }

}

?>