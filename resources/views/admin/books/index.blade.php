<x-admin.layouts.app :title="__('Book Management')">
    <h1 class="text-2xl font-medium">Book Management</h1>
    <div class="flex justify-between items-center mt-5">
        <form action="/admin/books" method="get" class="max-w-xl">
            <flux:input.group>
                <flux:input icon="magnifying-glass" placeholder="Search books..." name="search"
                    value="{{ request('search') }}" />
                <flux:select class="max-w-fit" name="order">
                    <flux:select.option value="title" selected>Title</flux:select.option>
                    <flux:select.option value="author">Author</flux:select.option>
                    <flux:select.option value="isbn">ISBN</flux:select.option>
                </flux:select>
            </flux:input.group>
        </form>
        <div class="flex gap-3">
            <flux:dropdown>
                <flux:button icon:trailing="chevron-down">Options</flux:button>

                <flux:menu>
                    <div class="block lg:hidden">
                        <flux:menu.item icon="plus" href="/admin/books/create">New Book</flux:menu.item>

                        <flux:menu.separator />
                    </div>

                    <flux:menu.submenu heading="Sort by">
                        <flux:menu.radio.group>
                            <flux:menu.radio checked>Name</flux:menu.radio>
                            <flux:menu.radio>Date</flux:menu.radio>
                            <flux:menu.radio>Popularity</flux:menu.radio>
                        </flux:menu.radio.group>
                    </flux:menu.submenu>

                    <flux:menu.submenu heading="Filter">
                        <flux:menu.checkbox checked>Draft</flux:menu.checkbox>
                        <flux:menu.checkbox checked>Published</flux:menu.checkbox>
                        <flux:menu.checkbox>Archived</flux:menu.checkbox>
                    </flux:menu.submenu>
                </flux:menu>
            </flux:dropdown>
            <div class="hidden lg:block">
                <flux:button icon="plus" variant="primary" href="/admin/books/create">New Book</flux:button>
            </div>
        </div>
    </div>
    <div class="overflow-x-auto mt-3">
        <table class="min-w-full divide-y-2 divide-gray-200 dark:divide-zinc-700">
            <thead class="ltr:text-left rtl:text-right">
                <tr class="*:font-medium *:text-gray-900 dark:*:text-white">
                    <th class="px-3 py-2 whitespace-nowrap">#</th>
                    <th class="px-3 py-2 whitespace-nowrap">Title</th>
                    <th class="px-3 py-2 whitespace-nowrap">Author</th>
                    <th class="px-3 py-2 whitespace-nowrap">ISBN</th>
                    <th class="px-3 py-2 whitespace-nowrap">Published Year</th>
                    <th class="px-3 py-2 whitespace-nowrap">Stock</th>
                    <th class="px-3 py-2 whitespace-nowrap">Category</th>
                    <th class="px-3 py-2 whitespace-nowrap">Options</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 dark:divide-zinc-700">
                @if ($books->count())
                    @foreach ($books as $book)
                        <x-admin.book-list :book="$book" :iter="__(($books->currentPage() - 1) * $books->perPage() + $loop->iteration)" />
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">
                            <h1 class="text-xl font-medium text-center my-5">No book found!</h1>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <ul class="flex justify-center gap-1 text-gray-900 dark:text-white mt-5">
        @if ($books->currentPage() != 1)
            <li>
                <a href="{{ $books->previousPageUrl() }}"
                    class="grid size-8 place-content-center rounded border border-zinc-200 transition-colors hover:bg-zinc-50 rtl:rotate-180 dark:border-zinc-700 dark:hover:bg-zinc-800"
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
            <a href="{{ $books->url(1) }}"
                class="block size-8 rounded border border-zinc-600 {{ $books->currentPage() == 1 ? 'bg-zinc-600' : '' }} text-center text-sm/8 font-medium text-white">
                1
            </a>
        </li>

        <li
            class="{{ $books->currentPage() > 4 ? 'block' : 'hidden' }} size-8 rounded border border-zinc-600 text-center text-sm/8 font-medium text-white">
            ...
        </li>

        @if ($books->lastPage() == 1)
        <div></div>
        @elseif ($books->currentPage() <= 3)
            @for ($i = 2; $i <= $books->currentPage() + 2; $i++)
                <li>
                    <a href="{{ $books->url($i) }}"
                        class="block size-8 rounded border border-zinc-600 {{ $books->currentPage() == $i ? 'bg-zinc-600' : '' }} text-center text-sm/8 font-medium text-white">
                        {{ $i }}
                    </a>
                </li>
            @endfor
        @elseif ($books->currentPage() >= $books->lastPage() - 2)
            @for ($i = $books->lastPage(); $i <= $books->lastPage() - 2; $i++)
                <li>
                    <a href="{{ $books->url($i) }}"
                        class="block size-8 rounded border border-zinc-600 {{ $books->currentPage() == $i ? 'bg-zinc-600' : '' }} text-center text-sm/8 font-medium text-white">
                        {{ $i }}
                    </a>
                </li>
            @endfor
        @else
            @for ($i = $books->currentPage() - 2; $i <= $books->currentPage() + 2; $i++)
                <li>
                    <a href="{{ $books->url($i) }}"
                        class="block size-8 rounded border border-zinc-600 {{ $books->currentPage() == $i ? 'bg-zinc-600' : '' }} text-center text-sm/8 font-medium text-white">
                        {{ $i }}
                    </a>
                </li>
            @endfor
        @endif

        <li
            class="{{ $books->currentPage() < ($books->lastPage() - 3) ? 'block' : 'hidden' }} size-8 rounded border border-zinc-600 text-center text-sm/8 font-medium text-white">
            ...
        </li>

        @if ($books->lastPage() >= 3)
        <li>
            <a href="{{ $books->url($books->lastPage()) }}"
                class="block size-8 rounded border border-zinc-600 {{ $books->currentPage() == $books->lastPage() ? 'bg-zinc-600' : '' }} text-center text-sm/8 font-medium text-white">
                {{ $books->lastPage() }}
            </a>
        </li>
        @endif

        @if ($books->currentPage() != $books->lastPage())
            <li>
                <a href="{{ $books->nextPageUrl() }}"
                    class="grid size-8 place-content-center rounded border border-zinc-200 transition-colors hover:bg-zinc-50 rtl:rotate-180 dark:border-zinc-700 dark:hover:bg-zinc-800"
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
</x-admin.layouts.app>