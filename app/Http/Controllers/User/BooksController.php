<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Book;
 

class BooksController extends Controller
{
    public function filteredByGenreIndex(string $id)
    {
        $genre = Genre::findOrFail($id);
        $books = $genre->Books()->paginate(6);

        return view('user.books.filtered-by-genre-index', compact('genre', 'books'));        
    }

    public function filteredByTitleIndex(Request $request)
    {
        $title = $request->title;

        $books = Book::where('title', 'LIKE', '%' . $title . '%')->paginate(6);

        return view('user.books.filtered-by-title-index', compact('title', 'books'));
    }

    public function filteredByAuthorsIndex(Request $request)
    {
        $authors = $request->authors;

        $books = Book::where('authors', 'LIKE', '%' . $authors . '%')->paginate(6);

        return view('user.books.filtered-by-authors-index', compact('authors', 'books'));
    }

    public function show(string $id, Request $request)
    {
        $book = Book::findOrFail($id);
        $genre_id = null;
        $title = null;
        $authors = null;
        if($request->genre_id){
            $genre_id = $request->genre_id;
        }
        elseif($request->title)
        {
            $title = $request->title;
        }
        elseif($request->authors)
        {
            $authors = $request->authors;
        }

        return view('user.books.show', compact('book', 'genre_id', 'title', 'authors'));
    }
}
