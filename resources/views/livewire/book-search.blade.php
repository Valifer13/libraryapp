<div>
    <h1 class="text-2xl font-bold">Book Lists</h1>
    <div>
        {{-- <flux:input type="text" wire:model.live.debounce.500ms="search" placeholder="Search Book..."> /> --}}
        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Cari buku..."
            class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 mt-4">
    </div>

    <div wire:loading.delay>
        <p class="text-gray-600 mt-4">Mencari...</p>
    </div>

    <div wire:loading.class="opacity-50"
        class="grid grid-cols-[repeat(auto-fill,_minmax(160px,_1fr))] md:grid-cols-[repeat(auto-fill,_minmax(180px,_1fr))] gap-3 mt-5 place-content-center">
        @forelse ($books as $book)
            <livewire:book-card :book="$book" />
        @empty
            @if (strlen($search) > 0)
                <h1 class="text-xl font-medium col-span-full text-center text-gray-700">
                    Tidak ada buku ditemukan untuk "{{ $search }}".
                </h1>
            @else
                <h1 class="text-xl font-medium col-span-full text-center text-gray-700">
                    Tidak ada buku sama sekali.
                </h1>
            @endif
        @endforelse
    </div>
    <div class="mt-5">
        <ul class="flex justify-center gap-1 text-zinc-900 dark:text-white">
            @if ($books->currentPage() != 1)
                <li>
                    <a href="{{ $books->previousPageUrl() }}"
                        class="grid size-8 place-content-center rounded border border-zinc-300 transition-colors bg-zinc-200 hover:bg-zinc-100 rtl:rotate-180 dark:border-zinc-700 dark:hover:bg-zinc-800"
                        aria-label="Previous page">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </li>
            @endif

            <li>
                <label for="Page" class="flex gap-2 items-center">
                    <span class="sr-only"> Page </span>

                    <form action="" method="get">
                        <input type="number" id="Page" value="{{ $books->currentPage() }}" name="page"
                            class="h-8 w-10 rounded border-zinc-300 sm:text-sm dark:border-zinc-600 dark:bg-zinc-900 dark:text-white" />
                    </form>

                    <span>/ {{ $books->lastPage() }}</span>
                </label>
            </li>

            @if ($books->currentPage() != $books->lastPage())
                <li>
                    <a href="{{ $books->nextPageUrl() }}"
                        class="grid size-8 place-content-center rounded border border-zinc-300 transition-colors bg-zinc-200 hover:bg-zinc-100 rtl:rotate-180 dark:border-zinc-700 dark:hover:bg-zinc-800"
                        aria-label="Next page">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
