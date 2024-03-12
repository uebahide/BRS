<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;

class BorrowsController extends Controller
{
    public function index()
    {
        $current_date = Carbon::now();

        $borrows_pending = Borrow::where('reader_id', Auth::id())->where('status', "PENDING")->orderByDesc('created_at')->get();
        $borrows_accepted = Borrow::where('reader_id', Auth::id())->where('status', "ACCEPTED")->orderByDesc('request_processed_at')->where('deadline', ">", $current_date)->get();
        $borrows_late = Borrow::where('reader_id', Auth::id())->where('status', "ACCEPTED")->orderBy('deadline')->where('deadline', "<=", $current_date)->get();
        $borrows_rejected = Borrow::where('reader_id', Auth::id())->orderByDesc('request_processed_at')->where('status', "REJECTED")->get();
        $borrows_returning = Borrow::where('reader_id', Auth::id())->orderByDesc('updated_at')->where('status', "RETURNING")->get();
        $borrows_returned = Borrow::where('reader_id', Auth::id())->orderByDesc('returned_at')->where('status', "RETURNED")->get();
        

        return view('user.borrows.index', compact(
            'borrows_pending', 
            'borrows_accepted', 
            'borrows_late', 
            'borrows_rejected', 
            'borrows_returning',
            'borrows_returned'
        ));
    }

    public function create(Request $request)
    {
        $borrow = Borrow::create([
            'reader_id' => Auth::id(),
            'book_id' => $request->book_id,
            'status' => "PENDING",
        ]);

        $book = Book::findOrFail($request->book_id);

        return redirect()->route('user.books.show', compact('book'))
            ->with([
                'message' => 'Application for book rental has been completed. Please wait a moment while your application is received.',
                'status' => 'info'
            ]);
    }

    public function show(string $id)
    {
        $borrow = Borrow::findOrFail($id);

        return view('user.borrows.show', compact('borrow'));
    }

    public function return(Request $request)
    {
        $borrow = Borrow::findOrFail($request->borrow_id);
        $borrow->status ="RETURNING";
        $borrow->save();

        return view('user.borrows.show', compact('borrow'));
    }
}
