<tr class="*:text-gray-900 *:first:font-medium dark:*:text-white">
    <td class="px-3 py-2 whitespace-nowrap flex items-center gap-2">
        <img src="{{ $book->cover ? asset('storage/' . $book->cover) : 'https://placehold.co/400x600' }}"
            alt="cover book" class="max-w-28">
        <div>
            <a href="/admin/books/{{ $book->id }}" class="text-md hover:underline">{{ $book->title }}</a>
            <p class="text-sm text-zinc-400">{{ $book->author }}</p>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <flux:badge color="{{ substr($book->category->color, 3, -4) }}" variant="pill">{{ $book->category->name }}</flux:badge>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">{{ $book->stock }}</td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="rounded-2xl w-fit flex gap-0 divide-zinc-500 divide-x-2 items-center">
            <flux:badge variant="pill" icon="hand-thumb-up" class="rounded-e-none! border border-blue-600 border-e-0" color="blue">{{ $book->liked }}</flux:badge>
            <flux:badge variant="pill" icon="hand-thumb-down" class="rounded-s-none! border border-red-600 border-s-0" color="red">{{ $book->disliked }}</flux:badge>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <flux:dropdown>
            <flux:button icon="ellipsis-horizontal"></flux:button>

            <flux:menu>
                <flux:menu.item icon="pencil" as="a" href="/admin/books/{{ $book->id }}/edit">Edit</flux:menu.item>
                <flux:menu.item icon="magnifying-glass" as="a" href="/admin/books/{{ $book->id }}">Detail
                </flux:menu.item>
                <form action="/admin/books/{{ $book->id }}" method="post">
                    @csrf
                    @method('delete')
                    <flux:menu.item icon="trash" variant="danger" type="submit">Delete</flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </td>
</tr>