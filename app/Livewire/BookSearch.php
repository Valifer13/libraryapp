<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class BookSearch extends Component
{
    use WithPagination;

    public $search = '';

    public function mount() {

    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $books = Book::query();

        if (strlen($this->search) > 0) {
            $books->where('title', 'like', '%' . $this->search . '%');
        }

        $books->with('category');

        $books = $books->paginate(10);

        return view('livewire.book-search', [ 'books' => $books ]);
    }
}
