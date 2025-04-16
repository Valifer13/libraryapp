<?php

namespace App\Livewire;

use Livewire\Component;

class BookCard extends Component
{
    public $title;
    public $author;
    public $category;
    public $liked;
    public $cover;

    public function mount($book) {
        $this->title = $book->title;
        $this->author = $book->author;
        $this->category = $book->category;
        $this->liked = $book->liked;
        $this->cover = $book->cover;
    }

    public function render()
    {
        return view('livewire.book-card');
    }
}
