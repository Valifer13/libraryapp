<tr class="*:text-gray-900 *:first:font-medium dark:*:text-white">
    <td class="px-3 py-2 whitespace-nowrap">{{ $iter }}</td>
    <td class="px-3 py-2 whitespace-nowrap flex items-center gap-2">
        <img src="https://placehold.co/400x600" alt="cover book" class="max-w-10">
        {{ $book->title }}
    </td>
    <td class="px-3 py-2 whitespace-nowrap">{{ $book->author }}</td>
    <td class="px-3 py-2 whitespace-nowrap">{{ $book->isbn }}</td>
    <td class="px-3 py-2 whitespace-nowrap">{{ $book->published_year }}</td>
    <td class="px-3 py-2 whitespace-nowrap">{{ $book->stock }}</td>
    <td class="px-3 py-2 whitespace-nowrap">{{ $book->category->name }}</td>
    <td class="px-3 py-2 whitespace-nowrap">
        <flux:button.group>
            <flux:button icon="pencil-square" class="bg-yellow-500! hover:bg-yellow-400!" href="/admin/books/{{ $book->id }}/edit"></flux:button>
            <form action="/admin/books/{{ $book->id }}" method="post">
                @csrf
                @method('delete')
                <flux:button icon="trash" variant="danger" type="submit" class="cursor-pointer"></flux:button>
            </form>
        </flux:button.group>
    </td>
</tr>