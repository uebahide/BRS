<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LibrarianController extends Controller
{
    //

    public function welcome()
    {
        return redirect()->route('librarian.dashboard');
    }
}
