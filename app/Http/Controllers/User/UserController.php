<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;
use App\Models\User;

class UserController extends Controller
{
    public function home()
    {
        $books = Book::all();
        $genres = Genre::all();
        $users = User::all();

        return view('user.home', compact('books', 'genres', 'users'));
    }
}
