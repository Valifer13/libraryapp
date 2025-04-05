<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request('search')) {
            $books = Book::with('category')->where(request('order'), 'like', '%' . request('search') . '%')->paginate(10);
        } else {
            $books = Book::with('category')->orderBy('title')->paginate(10);
        }

        return view('admin.books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.books.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Book::query()->create([
            'title' => $request['title'],
            'author' => $request['author'],
            'isbn' => $request['isbn'],
            'cover' => $request['cover'],
            'published_year' => $request['published_year'],
            'description' => $request['description'],
            'stock' => $request['stock'],
            'category_id' => $request['category'],
        ]);

        return redirect()->route('admin.books.index');
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
        //
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
}
