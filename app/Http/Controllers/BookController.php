<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request('search')) {
            $books = Book::with('category')->where(request('order'), 'like', '%' . request('search') . '%');
        } else {
            $books = Book::with('category')->latest();
        }

        return view('admin.books.index', ['books' => $books->paginate(10), 'total_books' => $books->count()]);
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
        $request->validate([
            'cover' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // $coverName = time().'_'.$request->cover->extension();

        $coverPath = $request->file('cover')->store('covers', 'public');
        
        Book::query()->create([
            'title' => $request['title'],
            'slug' => Str::slug($request['title']),
            'author' => $request['author'],
            'isbn' => $request['isbn'],
            'cover' => $coverPath,
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
        $book = Book::find($id);

        return view('admin.books.detail', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);
        $categories = Category::all();

        return view('admin.books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::find($id);

        $book->title = $request['title'];
        $book->slug = Str::slug($request['title']);
        $book->author = $request['author'];
        $book->isbn = $request['isbn'];
        $book->cover = $request['cover'] ?? $book->cover;
        $book->published_year = $request['published_year'];
        $book->description = $request['description'];
        $book->stock = $request['stock'];
        $book->category_id = $request['category'];

        $book->save();

        return redirect()->route('admin.books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);

        if($book->cover && Storage::disk('public')->exists($book->cover)) {
            Storage::disk('public')->delete($book->cover);
        }

        $book->delete();

        return redirect()->route('admin.books.index');
    }
}
