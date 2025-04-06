<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Loan::with(['book', 'user', 'admin']);

        if (request('search')) {
                $loans->whereHas(request('order'), fn($query) => $query->where(request('order') == 'book' ? 'title' : 'name', 'like', '%' . request('search') . '%'))
                ->latest();
        }

        return view('admin.loans.index', ['loans' => $loans->paginate(30)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $loan = Loan::find($id);

        return view('admin.loans.edit', compact('loan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function borrowing()
    {
        $loans = Loan::notReturned()->with(['book', 'user', 'admin'])->paginate(30);

        return view('admin.loans.borrowing', ['loans' => $loans]);
    }

    public function overdue()
    {
        $loans = Loan::overdue()->with(['book', 'user', 'admin'])->paginate(30);

        return view('admin.loans.overdue', ['loans' => $loans]);
    }

    public function returning()
    {
        $loans = Loan::with(['book', 'user', 'admin'])->paginate(30);
        
        return view('admin.loans.returning', ['loans' => $loans]);
    }
    
    public function history()
    {
        $loans = Loan::returned()->with(['book', 'user', 'admin'])->paginate(30);

        return view('admin.loans.history', ['loans' => $loans]);
    }
}
