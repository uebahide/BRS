<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenreRequest;
use Illuminate\Http\Request;
use App\Models\Genre;

class GenresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::select()->paginate(5);

        return view('librarian.genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('librarian.genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GenreRequest $request)
    {
        Genre::create([
            'name' => $request->name,
            'style' => $request->style
        ]);

        return redirect()->route('librarian.genres.index')
            ->with([
                "message" => "New genre was added successfully",
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
        $genre = Genre::findOrFail($id);

        return view('librarian.genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GenreRequest $request, string $id)
    {
        $genre = Genre::findOrFail($id);

        $genre->name = $request->name;
        $genre->style = $request->style;

        $genre->save();

        return redirect()->route('librarian.genres.index')
            ->with([
                'message' => "Genre was edited successfully",
                'status' => 'info'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genre = Genre::findOrFail($id);

        $genre->delete();

        return redirect()->route('librarian.genres.index')
            ->with([
                "message" => "The genre was archived successfully",
                "status" => "alert"
            ]);
    }

    public function expiredGenresIndex()
    {
        $genres = Genre::onlyTrashed()->select()->paginate(5);

        return view('librarian.expired-genres.index', compact('genres')); 
    }

    public function expiredGenresDestroy(string $id)
    {
        $expiredGenre = Genre::onlyTrashed()->findOrFail($id);
        $expiredGenre->forceDelete();

        return redirect()->route('librarian.expired-genres.index')
            ->with([
                'message' => "The Genre was deleted completely.",
                'status' => 'alert'
            ]);
    }

    public function expiredGenresRestore(string $id)
    {
        $deletedGenre = Genre::onlyTrashed()->where('id', $id)->first();
        $deletedGenre->restore();

        return redirect()->route('librarian.expired-genres.index')
            ->with([
                "message" => "Archived genre was activated successfully",
                "status" => "info"
            ]);
    }
}
