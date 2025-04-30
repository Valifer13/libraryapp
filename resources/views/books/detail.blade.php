<x-layouts.app :title="__('Detail Book')" :page="'book-detail'">
    @if (session('type') === 'success')
        <div id="flash" role="alert"
            class="fixed top-5 right-5 rounded-md border border-gray-300 bg-white p-4 shadow-sm">
            <div class="flex items-start gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6 text-green-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>

                <div class="flex-1">
                    <strong class="font-medium text-gray-900"> {{ session('status') }} </strong>

                    <p class="mt-0.5 text-sm text-gray-700">{{ session('message') }}</p>
                </div>

                <button
                    class="-m-3 rounded-full p-1.5 text-gray-500 transition-colors hover:bg-gray-50 hover:text-gray-700"
                    type="button" aria-label="Dismiss alert" onclick="">
                    <span class="sr-only">Dismiss popup</span>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    @elseif (session('type') === 'error')
        <div id="flash" role="alert" class="fixed top-5 right-5 border-s-4 border-red-700 bg-red-50 p-4">
            <div class="relative">
                <div class="flex items-center gap-2 text-red-700">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                        <path fill-rule="evenodd"
                            d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"
                            clip-rule="evenodd" />
                    </svg>

                    <strong class="font-medium"> {{ session('status') }} </strong>
                </div>

                <p class="mt-2 text-sm text-red-700">{{ session('message') }}</p>

                <button
                    class="absolute top-1 right-1 z-10 -m-3 rounded-full p-1.5 text-gray-500 transition-colors hover:bg-red-50 hover:text-gray-700"
                    type="button" aria-label="Dismiss alert" onclick="">
                    <span class="sr-only">Dismiss popup</span>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    @endif
    <section class="flex flex-col md:flex-row gap-10 justify-center align-middle">
        <div class="grid w-full md:w-fit place-content-center">
            <div class="max-w-[230px] max-h-[350px] drop-shadow-lg">
                <img src="{{ $book->cover ? asset('storage/' . $book->cover) : 'https://placehold.co/400x600' }}"
                    alt="">
            </div>
        </div>
        <div class="flex flex-col gap-3">
            <h1 class="text-3xl md:text-4xl font-bold">{{ $book->title }}</h1>
            <div class="flex gap-5">
                <h2 class="text-lg text-zinc-400 dark:text-zinc-300">By <a href="#"
                        class="font-medium transition cursor-pointer text-black dark:text-blue-800 hover:text-blue-500">{{ $book->author }}</a>
                </h2>
                <h2 class="text-lg text-zinc-400 dark:text-zinc-300">Category <flux:badge
                        color="{{ substr($book->category->color, 3, -4) }}" size="lg">{{ $book->category->name }}
                    </flux:badge>
                </h2>
            </div>
            <p class="max-h-[150px] max-w-[650px] overflow-y-auto pe-5 text-justify text-zinc-700 dark:text-zinc-400">
                {{ $book->description }}</p>
            <div class="flex gap-5 mt-2 items-center">
                @if ($book->stock > 0)
                    <form action="/books/{{ $book->id }}" method="post">
                        @csrf
                        <flux:button variant="primary" icon="shopping-cart" type="submit">Borrow Now</flux:button>
                    </form>
                @else
                    <flux:button variant="filled" icon="shopping-cart" class="line-through!">Borrow Now</flux:button>
                @endif
                <form action="/wishlists/{{ $book->id }}" method="post">
                    @csrf
                    <flux:button icon="bookmark" type="submit">Add to Wishlist</flux:button>
                </form>
                <p>
                    Stock: {{ $book->stock }}
                </p>
            </div>
        </div>
    </section>
</x-layouts.app>
