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

        $statuses = [
            'borrowed',
            'overdue',
            'returning',
            'returned',
        ];

        return view('admin.loans.edit', compact('loan', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $loan = Loan::find($id);

        $loan->book_id = $request['book_id'];
        $loan->user_id = $request['user_id'];
        $loan->admin_id = $request['admin_id'];
        $loan->borrow_date = $request['borrow_date'];
        $loan->due_date = $request['due_date'];
        $loan->return_date = $request['return_date'];
        $loan->status = $request['status'];

        $loan->save();

        return redirect()->route('admin.loans.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Loan::destroy($id);
        return redirect()->route('admin.loans.index');
    }

    public function borrowing()
    {
        $loans = Loan::borrowed()->with(['book', 'user', 'admin']);

        if (request('search')) {
                $loans->whereHas(request('order'), fn($query) => $query->where(request('order') == 'book' ? 'title' : 'name', 'like', '%' . request('search') . '%'))
                ->latest();
        }

        return view('admin.loans.borrowing', ['loans' => $loans->paginate(30)]);
    }

    public function overdue()
    {
        $loans = Loan::overdue()->with(['book', 'user', 'admin']);

        if (request('search')) {
                $loans->whereHas(request('order'), fn($query) => $query->where(request('order') == 'book' ? 'title' : 'name', 'like', '%' . request('search') . '%'))
                ->latest();
        }

        return view('admin.loans.overdue', ['loans' => $loans->paginate(30)]);
    }

    public function overduePaid(string $id)
    {
        $loan = Loan::find($id);

        $loan->return_date = now();
        $loan->admin_id = auth()->user()->id;
        $loan->status = 'returned';
        $loan->fine->paid = true;

        $loan->save();

        return redirect()->route('admin.loans.overdue');
    }

    public function returningPage()
    {
        $loans = Loan::returning()->with(['book', 'user', 'admin']);

        if (request('search')) {
                $loans->whereHas(request('order'), fn($query) => $query->where(request('order') == 'book' ? 'title' : 'name', 'like', '%' . request('search') . '%'))
                ->latest();
        }
        
        return view('admin.loans.returning', ['loans' => $loans->paginate(30)]);
    }

    public function returning(string $id)
    {
        $loan = Loan::find($id);

        $loan->return_date = now();
        $loan->admin_id = auth()->user()->id;
        $loan->status = 'returned';

        $loan->save();

        return redirect()->route('admin.loans.returning-page');
    }
    
    public function history()
    {
        $loans = Loan::returned()->with(['book', 'user', 'admin']);

        if (request('search')) {
                $loans->whereHas(request('order'), fn($query) => $query->where(request('order') == 'book' ? 'title' : 'name', 'like', '%' . request('search') . '%'))
                ->latest();
        }

        return view('admin.loans.history', ['loans' => $loans->paginate(30)]);
    }
}
