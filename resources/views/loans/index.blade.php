<x-layouts.app :title="__('Loans List')">
    <section>
        <h1 class="text-2xl font-medium">Your Loan List</h1>
        <div class="overflow-x-auto mt-5 p-3 border rounded-lg border-zinc-200 dark:border-zinc-500 bg-zinc-100 dark:bg-zinc-900">
            <table class="min-w-full divide-y-2 divide-zinc-200 dark:divide-zinc-700">
                <thead class="ltr:text-left rtl:text-right">
                    <tr class="*:font-medium *:text-gray-900 dark:*:text-white">
                        <th class="px-3 py-2 whitespace-nowrap">Book Title</th>
                        <th class="px-3 py-2 whitespace-nowrap">Borrow Date</th>
                        <th class="px-3 py-2 whitespace-nowrap">Due Date</th>
                        <th class="px-3 py-2 whitespace-nowrap">Status</th>
                        <th class="px-3 py-2 whitespace-nowrap">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-zinc-200 *:even:bg-zinc-50 dark:divide-zinc-700 dark:*:even:bg-zinc-800">
                    @foreach ($loans as $loan)
                        <tr class="*:text-gray-900 *:first:font-medium dark:*:text-white">
                            <td class="px-3 py-2 whitespace-nowrap">{{ $loan->book->title }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">{{ $loan->borrow_date }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">{{ $loan->due_date }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                @if ($loan->status == 'overdue')
                                    <flux:badge variant="pill" color="red" icon="exclamation-circle">
                                        {{ $loan->status }}</flux:badge>
                                @elseif($loan->status == 'returned')
                                    <flux:badge variant="pill" color="green" icon="check-circle">
                                        {{ $loan->status }}</flux:badge>
                                @elseif($loan->status == 'returning')
                                    <flux:badge variant="pill" color="yellow" icon="arrow-uturn-left">
                                        {{ $loan->status }}</flux:badge>
                                @else
                                    <flux:badge variant="pill" color="blue" icon="clock">{{ $loan->status }}
                                    </flux:badge>
                                @endif
                            </td>
                            @if ($loan->status === 'borrowed')
                                <td class="px-3 py-2 whitespace-nowrap">
                                    <form action="/loans/{{ $loan->id }}" method="post">
                                        @csrf
                                        <flux:button icon="arrow-uturn-left" type="submit">Return</flux:button>
                                    </form>
                                </td>
                            @else
                                <td></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</x-layouts.app>
