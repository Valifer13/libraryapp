<x-layouts.app :title="__('Detail Book')">
    <section class="flex gap-10">
        <div class="max-w-[230px] max-h-[350px] drop-shadow-lg">
            <img src="{{ $book->cover ? asset('storage/' . $book->cover) : 'https://placehold.co/400x600' }}" alt="">
        </div>
        <div class="flex flex-col gap-3">
            <h1 class="text-4xl font-medium">{{ $book->title }}</h1>
            <div class="flex gap-5">
                <h2 class="text-lg text-zinc-400 dark:text-zinc-300">By <a href="#" class="font-medium transition cursor-pointer text-black dark:text-blue-800 hover:text-blue-500">{{ $book->author }}</a></h2>
                <h2 class="text-lg text-zinc-400 dark:text-zinc-300">Category <flux:badge color="{{ substr($book->category->color, 3, -4) }}" size="lg">{{ $book->category->name }}</flux:badge></h2>
            </div>
            <p class="max-h-[150px] max-w-[650px] overflow-y-auto pe-5 text-justify text-zinc-700 dark:text-zinc-400">{{ $book->description }}</p>
            <div class="flex gap-5 mt-2">
                <flux:button variant="primary" icon="shopping-cart">Borrow Now</flux:button>
                <flux:button icon="bookmark">Add to Wishlist</flux:button>
            </div>
        </div>
    </section>
</x-layouts.app>