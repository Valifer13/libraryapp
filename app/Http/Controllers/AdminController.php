<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function bookManage()
    {
        if (request('search')) {
            $books = Book::where('title', 'like', '%' . request('search') . '%')->get();
        } else {
            $books = Book::all();
        }

        return view('admin.book-manage', ['books' => $books]);
    }
}
