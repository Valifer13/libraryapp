<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::with('book')->where('user_id', auth()->user()->id)->get();

        return view('wishlist', ['wishlists' => $wishlists]);
    }

    public function store(String $book_id)
    {
        $book = Book::find($book_id);
        Wishlist::query()->create([
            'user_id' => auth()->user()->id,
            'book_id' => $book_id,
        ]);

        return redirect()->route('books.detail', [$book->slug]);
    }
}
