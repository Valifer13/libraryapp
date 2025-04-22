<tr class="*:text-gray-900 *:first:font-medium dark:*:text-white">
    <td class="px-3 py-2 whitespace-nowrap">{{ $iter }}</td>
    <td class="px-3 py-2 whitespace-nowrap">
        <h1 class="text-base">{{ $loan->book->title ?? 'unknown' }}</h1>
        <h2 class="text-sm text-zinc-400">User: {{ $loan->user->name }}</h2>
        <h2 class="text-sm text-zinc-400">Admin: {{ $loan->admin->name }}</h2>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">{{ $loan->borrow_date }}</td>
    <td class="px-3 py-2 whitespace-nowrap">{{ $loan->due_date }}</td>
    @if(request()->is('admin/loans/history'))
        <td class="px-3 py-2 whitespace-nowrap">{{ $loan->return_date }}</td>
        <td class="px-3 py-2 whitespace-nowrap">
            <flux:badge variant="pill" color="green" icon="check-circle">{{ $loan->status }}</flux:badge>
        </td>
        <td class="px-3 py-2 whitespace-nowrap">
            <flux:dropdown offset="-15" gap="2">
                <flux:button icon="ellipsis-horizontal" size="sm"></flux:button>

                <flux:menu>
                    <flux:menu.item icon="pencil" as="a" href="/admin/loans/{{ $loan->id }}/edit">Edit</flux:menu.item>
                    <flux:menu.item icon="magnifying-glass" as="a" href="/admin/loans/{{ $loan->id }}">Detail
                    </flux:menu.item>
                    <form action="/admin/loans/{{ $loan->id }}" method="post">
                        @csrf
                        @method('delete')
                        <flux:menu.item icon="trash" variant="danger" type="submit">Delete</flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </td>
    @elseif(request()->is('admin/loans/returning'))
        <td class="px-3 py-2 whitespace-nowrap">
            <flux:badge variant="pill" color="yellow" icon="arrow-uturn-left">{{ $loan->status }}</flux:badge>
        </td>
        <td>
            <form action="/admin/loans/returning/{{ $loan->id }}" method="post">
                @csrf
                @method('put')
                <flux:button icon="check" class="bg-green-600! hover:bg-green-500!" type="submit">Accept</flux:button>
            </form>
        </td>
    @elseif(request()->is('admin/loans/overdue'))
        <td class="px-3 py-2 whitespace-nowrap">
            @if($loan->status == 'overdue')
                <flux:badge variant="pill" color="red" icon="exclamation-circle">{{ $loan->status }}</flux:badge>
            @elseif($loan->status == 'returned')
                <flux:badge variant="pill" color="green" icon="check-circle">{{ $loan->status }}</flux:badge>
            @elseif($loan->status == 'returning')
                <flux:badge variant="pill" color="yellow" icon="arrow-uturn-left">{{ $loan->status }}</flux:badge>
            @else
                <flux:badge variant="pill" color="blue" icon="clock">{{ $loan->status }}</flux:badge>
            @endif
        </td>
        <td class="px-3 py-2 whitespace-nowrap">
            <flux:badge icon="currency-dollar" variant="pill" color="green">{{ $loan->fine->amount }}</flux:badge>
        </td>
        <td class="px-3 py-2 whitespace-nowrap">
            <form action="/admin/loans/overdue/{{ $loan->id }}" method="post">
                @csrf
                @method('put')
                <flux:button type="submit" icon="check">Paid</flux:button>
            </form>
        </td>
        <td class="px-3 py-2 whitespace-nowrap">
            <flux:dropdown>
                <flux:button icon="ellipsis-horizontal"></flux:button>

                <flux:menu>
                    <flux:menu.item icon="pencil" href="/admin/loans/{{ $loan->id }}/edit">Edit</flux:menu.item>
                    <flux:menu.item icon="magnifying-glass" href="/admin/loans/{{ $loan->id }}">Detail</flux:menu.item>
                    <form action="/admin/loans/{{ $loan->id }}" method="post">
                        @csrf
                        @method('delete')
                        <flux:menu.item icon="trash" variant="danger" type="submit">Delete</flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </td>
    @else
        <td class="px-3 py-2 whitespace-nowrap">
            @if($loan->status == 'overdue')
                <flux:badge variant="pill" color="red" icon="exclamation-circle">{{ $loan->status }}</flux:badge>
            @elseif($loan->status == 'returned')
                <flux:badge variant="pill" color="green" icon="check-circle">{{ $loan->status }}</flux:badge>
            @elseif($loan->status == 'returning')
                <flux:badge variant="pill" color="yellow" icon="arrow-uturn-left">{{ $loan->status }}</flux:badge>
            @else
                <flux:badge variant="pill" color="blue" icon="clock">{{ $loan->status }}</flux:badge>
            @endif
        </td>
        <td class="px-3 py-2 whitespace-nowrap">
            <flux:dropdown>
                <flux:button icon="ellipsis-horizontal"></flux:button>

                <flux:menu>
                    <flux:menu.item icon="pencil" href="/admin/loans/{{ $loan->id }}/edit">Edit</flux:menu.item>
                    <flux:menu.item icon="magnifying-glass" href="/admin/loans/{{ $loan->id }}">Detail</flux:menu.item>
                    <form action="/admin/loans/{{ $loan->id }}" method="post">
                        @csrf
                        @method('delete')
                        <flux:menu.item icon="trash" variant="danger" type="submit">Delete</flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </td>
    @endif
</tr>