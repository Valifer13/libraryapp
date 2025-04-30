<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        if (request('search')) {
            $books = Book::where(request('order'), 'LIKE', '%' . request('search') . '%')
                ->with('category')
                ->latest()
                ->paginate(30);
        } else {
            $books = Book::with('category')
                ->latest()
                ->paginate(30);
        }

        return view('books.index', ['books' => $books]);
    }

    public function show(String $slug)
    {
        $book = Book::where('slug', $slug)->first();

        return view('books.detail', compact('book'));
    }
}
