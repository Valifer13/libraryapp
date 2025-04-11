<x-admin.layouts.app>
    <section class="flex flex-col md:flex-row gap-5 items-start">
        <div class="items-center w-full md:w-fit flex justify-center">
            <img src="{{ $book->cover ? asset('storage/' . $book->cover) : 'https://placehold.co/400x600' }}" alt="" class="max-w-[200px]">
        </div>
        <div class="flow-root w-full">
            <dl
                class="mb-3 divide-y divide-gray-200 rounded border border-gray-200 text-sm *:even:bg-gray-50 dark:divide-zinc-700 dark:border-zinc-600 dark:*:even:bg-zinc-700">
                <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-zinc-900 dark:text-white">Title</dt>

                    <dd class="text-zinc-700 sm:col-span-2 dark:text-zinc-200">{{ $book->title }}</dd>
                </div>

                <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-zinc-900 dark:text-white">Author</dt>

                    <dd class="text-zinc-700 sm:col-span-2 dark:text-zinc-200">{{ $book->author }}</dd>
                </div>

                <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-zinc-900 dark:text-white">ISBN</dt>

                    <dd class="text-zinc-700 sm:col-span-2 dark:text-zinc-200">{{ preg_replace("/(.{3})(.{3})(.{3})(.{3})(.{1})/", "$1-$2-$3-$4-$5", $book->isbn) }}</dd>
                </div>

                <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4 items-center">
                    <dt class="font-medium text-zinc-900 dark:text-white">Category</dt>

                    <dd class="text-zinc-700 sm:col-span-2 dark:text-zinc-200">
                        <flux:badge color="{{ substr($book->category->color, 3, -4) }}" variant="pill">
                            {{ $book->category->name }}</flux:badge>
                    </dd>
                </div>

                <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-zinc-900 dark:text-white">Published Year</dt>

                    <dd class="text-zinc-700 sm:col-span-2 dark:text-zinc-200">{{ $book->published_year }}</dd>
                </div>

                <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4 items-center">
                    <dt class="font-medium text-zinc-900 dark:text-white">Liked / Disliked</dt>

                    <dd class="text-zinc-700 sm:col-span-2 dark:text-zinc-200">
                        <div class="rounded-2xl w-fit flex gap-0 divide-zinc-500 divide-x-2 items-center">
                            <flux:badge variant="pill" icon="hand-thumb-up"
                                class="rounded-e-none! border border-blue-600 border-e-0" color="blue">
                                {{ $book->liked }}
                            </flux:badge>
                            <flux:badge variant="pill" icon="hand-thumb-down"
                                class="rounded-s-none! border border-red-600 border-s-0" color="red">
                                {{ $book->disliked }}
                            </flux:badge>
                        </div>
                    </dd>
                </div>

                <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-zinc-900 dark:text-white">Stock</dt>

                    <dd class="text-zinc-700 sm:col-span-2 dark:text-zinc-200">{{ $book->stock }}</dd>
                </div>

                <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium text-zinc-900 dark:text-white">Description</dt>

                    <dd class="text-zinc-700 sm:col-span-2 dark:text-zinc-200">
                        {{ $book->description }}
                    </dd>
                </div>
            </dl>
            <div class="my-3 flex gap-3 justify-end">
                <flux:button icon="arrow-uturn-left" as="a" href="/admin/books">Back</flux:button>
                <flux:button icon="pencil" variant="primary" as="a" href="/admin/books/{{ $book->id }}/edit">Edit
                </flux:button>
            </div>
        </div>
    </section>
</x-admin.layouts.app>