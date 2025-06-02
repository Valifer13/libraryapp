<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BookDetail extends Component
{
    public Book $book;
    public $slug;

    public function mount($slug) {
        $this->slug = $slug;
        $this->loadBook();
    }

    public function loadBook() {
        $book = Book::where('slug', $this->slug)->first();

        if (!$book) {
            throw new NotFoundHttpException;
        }

        $this->book = $book;
    }

    public function wishlist()
    {
        $this->book->addWishlistBy(auth()->user());
        $this->dispatch('wishlist-added', message: 'Book added to wishlist!');
    }

    public function borrow()
    {
        if ($this->book->stock <= 0) {
            session()->flash('type', 'error');
            session()->flash('status', 'Book stock is empty!');
            session()->flash('message', 'The book stock is currently empty, please try again later.');
            return;
        }

        $this->book->BorrowedBy(auth()->user());
        session()->flash('type', 'success');
        session()->flash('status', 'Book borrowed!');
        session()->flash('message', 'The book successfully borrowed, please return it when the time is come.');
    }
 
    public function render()
    {
        return view('livewire.book-detail');
    }
}
