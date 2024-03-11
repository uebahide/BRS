<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BorrowsController extends Controller
{
    public function index()
    {
        $borrows = Borrow::where('reader_id', Auth::id())->get();
        // dd(count($borrows));

        $currente_data = Carbon::now();

        $borrows_pending = Borrow::where('reader_id', Auth::id())->where('status', "PENDING")->get();
        // dd(count($borrows_pending));
        $borrows_accepted = Borrow::where('reader_id', Auth::id())->where('status', "ACCEPTED")
            ->where('deadline', ">", $currente_data)->get();
        // dd(count($borrows_accepted));
        $borrows_late = Borrow::where('reader_id', Auth::id())->where('status', "ACCEPTED")
            ->where('deadline', "<=", $currente_data)->get();
        // dd(count($borrows_late));
        $borrows_rejected = Borrow::where('reader_id', Auth::id())->where('status', "REJECTED")->get();
        $borrows_returned = Borrow::where('reader_id', Auth::id())->where('status', "RETURNED")->get();

        return view('user.borrows.index', compact(
            'borrows_pending', 
            'borrows_accepted', 
            'borrows_late', 
            'borrows_rejected', 
            'borrows_returned'
        ));
    }

    public function create(Request $request)
    {

    }

    public function show(string $id)
    {
        $borrow = Borrow::findOrFail($id);

        return view('user.borrows.show', compact('borrow'));
    }
}
