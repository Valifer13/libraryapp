<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;

class BookCard extends Component
{
    public $book;

    public function mount(Book $book) {
        $this->book = $book;
    }

    public function render()
    {
        return view('livewire.book-card');
    }
}
