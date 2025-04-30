<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::where('user_id', auth()->user()->id)
            ->where('status', '!=', 'returned')
            ->get();

        return view('loans.index', compact('loans'));
    }

    public function borrowing(String $book_id)
    {
        $book = Book::find($book_id);

        if ($book->stock <= 0) {
            return redirect()->route('books.detail', [$book->slug])->with([
                'type' => 'error',
                'status' => 'Book stock is empty!',
                'message' => 'The book stock is currently empty, please try again later.',
            ]);
        }

        Loan::query()->create([
            'book_id' => $book_id,
            'user_id' => auth()->user()->id,
            'borrow_date' => now(),
            'due_date' => now()->addDays(7),
        ]);

        $book->stock -= 1;
        $book->save();

        return redirect()->route('books.detail', [$book->slug])->with([
            'type' => 'success',
            'status' => 'Book borrowed!',
            'message' => 'The book successfully borrowed, please return it when the time is come.',
        ]);
    }

    public function returning(String $id)
    {
        $loan = Loan::find($id);

        $loan->status = 'returning';

        $loan->save();

        return redirect()->route('loans');
    }

    public function history()
    {
        $loans = Loan::with('book')->where('user_id', auth()->user()->id)
            ->where('status', 'returned')
            ->latest()
            ->get();
        
        return view('loans.history', compact('loans'));
    }
}
