<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Borrow;
use Illuminate\Support\Facades\Auth;

class BorrowsController extends Controller
{
    public function index()
    {
        $current_date = Carbon::now();

        $borrows_pending = Borrow::where('status', "PENDING")->orderByDesc('created_at')->get();
        $borrows_accepted = Borrow::where('status', "ACCEPTED")
        ->orderByDesc('request_processed_at')->where('deadline', ">", $current_date)->get();
        $borrows_late = Borrow::where('status', "ACCEPTED")->orderBy('deadline')->where('deadline', "<=", $current_date)->get();
        $borrows_rejected = Borrow::where('status', "REJECTED")->orderByDesc('request_processed_at')->get();
        $borrows_returning = Borrow::where('status', "RETURNING")->orderByDesc('updated_at')->get();
        $borrows_returned = Borrow::where('status', "RETURNED")->orderByDesc('returned_at')->get();
        

        return view('librarian.borrows.index', compact(
            'borrows_pending', 
            'borrows_accepted', 
            'borrows_late', 
            'borrows_rejected', 
            'borrows_returning',
            'borrows_returned'
        ));
    }

    public function show(string $id)
    {
        $borrow = Borrow::findOrFail($id);

        return view('librarian.borrows.show', compact('borrow'));
    }

    public function acceptPending(Request $request)
    {
        $request->validate([
            'deadline' => 'required | date | after:today'
        ]);

        $borrow = Borrow::findOrFail($request->borrow_id);
        $borrow->status = "ACCEPTED";
        $borrow->request_processed_at = now()->format('Y-m-d H:i:s');
        $borrow->request_managed_by = $request->request_managed_by;
        $borrow->deadline = $request->deadline;
        $borrow->save();

        return redirect()->route('librarian.borrows.show', compact('borrow'))
            ->with([
                "message" => "Pending was accepted successfully",
                "status" => "info"
            ]);
    }

    public function rejectPending(Request $request)
    {
        $borrow = Borrow::findOrFail($request->borrow_id);
        $borrow->status = "REJECTED";
        $borrow->request_processed_at = now()->format('Y-m-d H:i:s');
        $borrow->request_managed_by = $request->request_managed_by;
        $borrow->save();

        return redirect()->route('librarian.borrows.show', compact('borrow'))
        ->with([
            "message" => "Pending was rejected ",
            "status" => "alert"
        ]);
    }

    public function acceptReturning(Request $request)
    {
        $borrow = Borrow::findOrFail($request->borrow_id);

        $borrow->status = "RETURNED";
        $borrow->returned_at = now()->format('Y-m-d H:i:s');
        $borrow->return_managed_by = $request->return_managed_by;

        $borrow->save();

        return redirect()->route('librarian.borrows.show', compact('borrow'))
        ->with([
            "message" => "Returning was accepted successfully",
            "status" => "info"
        ]);
    }

}