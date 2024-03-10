<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\book_genre;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;
use PHPUnit\Event\Code\Throwable;
use Illuminate\Support\Facades\Log;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
        
    // }

    public function filteredByGenreIndex(string $id)
    {
        $genre = Genre::findOrFail($id);
        $books = $genre->Books()->paginate(6);

        return view('librarian.books.filtered-by-genre-index', compact('genre', 'books'));        
    }

    public function filteredByTitleIndex(string $title)
    {

        $books = Book::where('title', 'LIKE', '%' . $title . '%')->paginate(6);

        return view('librarian.books.filtered-by-title-index', compact('title', 'books'));
    }

    public function filteredByAuthorsIndex(string $authors)
    {

        $books = Book::where('authors', 'LIKE', '%' . $authors . '%')->paginate(6);

        return view('librarian.books.filtered-by-authors-index', compact('authors', 'books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();

        return view('librarian.books.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {

        try{
            DB::transaction(function() use ($request){
                $book = Book::create([
                    "title" => $request->title,
                    "authors"=> $request->authors,
                    "description" => $request->description,
                    "released_at" => $request->released_at,
                    // "cover_image" => $request->cover_image,
                    "pages" => $request->pages,
                    // "language_code" =>  $request->language_code,
                    "isbn" => $request->isbn,
                    "in_stock" => $request->in_stock,
                ]);

                $genre_ids = $request->genres;

                foreach($genre_ids as $genre_id){
                    book_genre::create([
                        "book_id" => $book->id,
                        "genre_id" => $genre_id
                    ]);
                }
            });
        }
        catch(Throwable $e)
        {
            Log::error($e);
            throw $e;
        }

        return redirect()->route('librarian.home')
            ->with([
                "message" => "New book was created successfully",
                "status" => "info"
            ]);
    }

    /**
     * Display the specified resource.
     */
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

        return view('librarian.books.show', compact('book', 'genre_id', 'title', 'authors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {
        $genre_id = $request->genre_id;
        $title = $request->title;
        $authors = $request->authors;

        $book = Book::findOrFail($id);
        $genres = Genre::all();
        $current_genres = [];
        foreach($book->Genres as $genre){
            $current_genres[] = $genre->id;
        }

        return view('librarian.books.edit', compact('book', 'genres', 'current_genres', 'genre_id', 'title', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);

        $book->title = $request->title;
        $book->authors = $request->authors;
        $book->description = $request->description;
        $book->released_at = $request->released_at;
        // "cover_image" => $request->cover_image,
        $book->pages = $request->pages;
        // "language_code" =>  $request->language_code,
        $book->isbn = $request->isbn;
        $book->in_stock = $request->in_stock;

        $book_genres = book_genre::where('book_id', $id)->get();
        foreach($book_genres as $book_genre){
            $book_genre->delete();
        }

        $genre_ids = $request->genres;

        foreach($genre_ids as $genre_id){
            book_genre::create([
                "book_id" => $book->id,
                "genre_id" => $genre_id
            ]);
        }

        $book->save();

        $genre_id = $request->genre_id;
        $title = $request->searched_title;
        $authors = $request->searched_authors;

        return view('librarian.books.show', compact('book', 'genre_id', 'title', 'authors'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);

        $book->delete();

        return redirect()->route('librarian.home')
            ->with([
                "message" => "The book was archived successfully",
                "status" => "alert"
            ]);
    }

    public function expiredBooksIndex()
    {
        $books = Book::onlyTrashed()->select()->paginate(5);

        return view('librarian.expired-books.index', compact('books')); 
    }

    public function expiredBooksDestroy(string $id)
    {
        $expiredBook = Book::onlyTrashed()->findOrFail($id);
        $expiredBook->forceDelete();

        return redirect()->route('librarian.expired-books.index')
            ->with([
                'message' => "The Book was deleted completely.",
                'status' => 'alert'
            ]);
    }

    public function expiredBooksRestore(string $id)
    {
        $deletedBook = Book::onlyTrashed()->where('id', $id)->first();
        $deletedBook->restore();

        return redirect()->route('librarian.expired-books.index')
            ->with([
                "message" => "Archived book was activated successfully",
                "status" => "info"
            ]);
    }
}
