<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function booksPage()
    {
        $books = Book::with('category')
            ->latest()
            ->get();

        return view('books', ['books' => $books]);
    }
}
