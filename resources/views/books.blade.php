<x-layouts.app :title="__('Books List')" :page="'user-books'">
    <div class="w-full sticky top-0 left-0 right-0 z-50 bg-zinc-50 px-5 -m-1 md:m-0 py-3 border-b border-b-zinc-200 border-s border-s-zinc-200">
        <flux:input icon="magnifying-glass" placeholder="Search book..." class="max-w-sm! md:max-w-xs!" id="search" name="search" />
    </div>
    <div id="search-results" class="mt-5 w-full grid items-stretch gap-3 justify-items-center" style="grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));">
        @foreach ($books as $book)
            <livewire:book-card :book="$book" />
        @endforeach
    </div>
</x-layouts.app>