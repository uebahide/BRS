<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\Genre;

class LibrarianController extends Controller
{
    //

    public function welcome()
    {
        return redirect()->route('librarian.home');
    }

    public function home()
    {
        $books = Book::all();
        $genres = Genre::all();
        $users = User::all();
        $active_count = 0;

        foreach($books as $book){
            foreach($book->borrows as $borrow){
                if($borrow->status == "ACCEPTED"){
                    $active_count++;
                }
            }
        }

        return view('librarian.home', compact('books', 'genres', 'users', 'active_count'));
    }
}
