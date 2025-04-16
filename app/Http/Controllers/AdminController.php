<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $totalBooks = 0;
        $totalLoans = Loan::notReturned()->count();
        $totalReturns = Loan::returned()->count();

        foreach ($books as $book) {
            $totalBooks += $book->stock;
        }

        return view('admin.dashboard', compact('totalBooks', 'totalLoans', 'totalReturns'));
    }

    public function settings()
    {
        return view('admin.settings');
    }
}
