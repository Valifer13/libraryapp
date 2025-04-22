<x-layouts.app :title="__('Books List')" :page="'user-books'">
    <section>
        <h1 class="text-2xl font-bold">Book Lists</h1>
        <div class="p-3 rounded-lg border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-900 mt-4">
            <form action="/books" method="get">
                <flux:input icon="magnifying-glass" placeholder="Search book..." name="search" value="{{ request('search') }}" class="max-w-sm!" />
            </form>
        </div>
        <div class="grid grid-cols-[repeat(auto-fill,_minmax(160px,_1fr))] md:grid-cols-[repeat(auto-fill,_minmax(180px,_1fr))] gap-3 mt-4 p-3 place-content-center border bg-zinc-50 dark:bg-zinc-900 border-zinc-200 dark:border-zinc-700 rounded-lg">
            @foreach ($books as $book)
                <livewire:book-card :book="$book" />
            @endforeach
        </div>
    </section>
</x-layouts.app>