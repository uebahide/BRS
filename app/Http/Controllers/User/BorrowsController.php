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
        $current_date = Carbon::now();

        // $borrows_pending = Borrow::where('reader_id', Auth::id())->where('status', "PENDING")->paginate(4, ['*'], 'pending_page');
        // $borrows_accepted = Borrow::where('reader_id', Auth::id())->where('status', "ACCEPTED")->where('deadline', ">", $current_date)->paginate(4, ['*'], 'accepted_page');
        // $borrows_late = Borrow::where('reader_id', Auth::id())->where('status', "ACCEPTED")->where('deadline', "<=", $current_date)->paginate(4, ['*'], 'late_page');
        // $borrows_rejected = Borrow::where('reader_id', Auth::id())->where('status', "REJECTED")->paginate(4, ['*'], 'rejected_page');
        // $borrows_returned = Borrow::where('reader_id', Auth::id())->where('status', "RETURNED")->paginate(4, ['*'], 'returned_page');
        $borrows_pending = Borrow::where('reader_id', Auth::id())->where('status', "PENDING")->get();
        $borrows_accepted = Borrow::where('reader_id', Auth::id())->where('status', "ACCEPTED")->where('deadline', ">", $current_date)->get();
        $borrows_late = Borrow::where('reader_id', Auth::id())->where('status', "ACCEPTED")->where('deadline', "<=", $current_date)->get();
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
