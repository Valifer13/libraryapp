<tr class="*:text-gray-900 *:first:font-medium dark:*:text-white">
    <td class="px-3 py-2 whitespace-nowrap">{{ $iter }}</td>
    <td class="px-3 py-2 whitespace-nowrap">{{ $loan->book->title }}</td>
    <td class="px-3 py-2 whitespace-nowrap">{{ $loan->user->name }}</td>
    <td class="px-3 py-2 whitespace-nowrap">{{ $loan->admin->name }}</td>
    <td class="px-3 py-2 whitespace-nowrap">{{ $loan->borrow_date }}</td>
    <td class="px-3 py-2 whitespace-nowrap">{{ $loan->due_date }}</td>
    <td class="px-3 py-2 whitespace-nowrap">
        @if($loan->status == 'overdue')
            <flux:badge variant="pill" color="red" icon="exclamation-circle">{{ $loan->status }}</flux:badge>
        @elseif($loan->status == 'returned')
            <flux:badge variant="pill" color="green" icon="check-circle">{{ $loan->status }}</flux:badge>
        @else
            <flux:badge variant="pill" color="blue" icon="clock">{{ $loan->status }}</flux:badge>
        @endif
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <flux:button.group>
            <flux:button icon="pencil-square" class="bg-yellow-500! hover:bg-yellow-400!" href="/admin/loans/{{ $loan->id }}/edit"></flux:button>
            <flux:button icon="document-magnifying-glass" class="bg-blue-500! hover:bg-blue-400!" href="/admin/loans/{{ $loan->id }}"></flux:button>
            <form action="/admin/loans/{{ $loan->id }}" method="post">
                @csrf
                @method('delete')
                <flux:button icon="trash" variant="danger" type="submit" class="cursor-pointer"></flux:button>
            </form>
        </flux:button.group>
    </td>
</tr>