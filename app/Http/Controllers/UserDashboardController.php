<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function booksPage(Request $request)
    {
        $query = $request->input('query');

        $books = Book::with('category')
            ->where('title', 'LIKE', "%$query%")
            ->latest()
            ->get();

        return view('books', ['books' => $books]);
    }

    // public function booksSearch(Request $request)
    // {
    //     $query = $request->input('query');

    //     $books = Book::with('category')
    //         ->where('title', 'LIKE', "%$query%")
    //         ->latest()
    //         ->get();

    //     return response()->json($books);
    // }
}
