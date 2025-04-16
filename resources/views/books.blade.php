<x-layouts.app :title="__('Books List')">
    <div class="w-full sticky top-0 left-0 right-0 z-50 bg-zinc-50 p-5 border-b border-b-zinc-200 border-s border-s-zinc-200">
        <flux:input icon="magnifying-glass" placeholder="Search book..." class="max-w-xs!" id="search" name="search" />
    </div>
    <div class="mt-5 w-full grid grid-cols-2 items-stretch md:grid-cols-4 gap-y-3 justify-items-center px-3">
        @foreach ($books as $book)
            <livewire:book-card :book="$book" />
        @endforeach
    </div>
</x-layouts.app>