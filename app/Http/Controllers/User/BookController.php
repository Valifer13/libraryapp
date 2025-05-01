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

        $user = auth()->user();
        $inWishlist = $user->wishlists()->where('book_id', $book->id)->exists();
        $alreadyBorrowed = $user->loans()->where('status', '!=', 'returned')->where('book_id', $book->id)->exists();
        $totalLoans = $user->loans()->where('status', '!=', 'returned')->count();

        return view('books.detail', compact(
            'book',
            'inWishlist',
            'alreadyBorrowed',
            'totalLoans',
        ));
    }
}
