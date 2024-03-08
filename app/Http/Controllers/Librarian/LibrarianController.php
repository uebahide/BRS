<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

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

        return view('librarian.home', compact('books'));
    }
}
