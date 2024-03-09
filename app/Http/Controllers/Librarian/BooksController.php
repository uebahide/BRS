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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
