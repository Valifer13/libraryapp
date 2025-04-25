<x-layouts.app :title="__('Loans History')">
    <section>
        <h1 class="text-2xl font-medium">Loans History</h1>
        <div
            class="overflow-x-auto mt-5 p-3 border rounded-lg border-zinc-200 dark:border-zinc-500 bg-zinc-100 dark:bg-zinc-900">
            <table class="min-w-full divide-y-2 divide-zinc-200 dark:divide-zinc-700">
                <thead class="ltr:text-left rtl:text-right">
                    <tr class="*:font-medium *:text-gray-900 dark:*:text-white">
                        <th class="px-3 py-2 whitespace-nowrap">Book Title</th>
                        <th class="px-3 py-2 whitespace-nowrap">Borrow Date</th>
                        <th class="px-3 py-2 whitespace-nowrap">Return Date</th>
                        <th class="px-3 py-2 whitespace-nowrap">Status</th>
                        <th class="px-3 py-2 whitespace-nowrap">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-zinc-200 *:even:bg-zinc-50 dark:divide-zinc-700 dark:*:even:bg-zinc-800">
                    @foreach ($loans as $loan)
                        <tr class="*:text-gray-900 *:first:font-medium dark:*:text-white">
                            <td class="px-3 py-2 whitespace-nowrap">{{ $loan->book->title }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">{{ $loan->borrow_date }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">{{ $loan->return_date }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <flux:badge variant="pill" color="green" icon="check-circle">{{ $loan->status }}
                                </flux:badge>
                            </td>
                            <td>
                                <flux:button icon="magnifying-glass" class="text-blue-500! bg-blue-100! dark:bg-blue-500! dark:text-blue-200! hover:bg-blue-200! dark:hover:bg-blue-400!">Detail</flux:button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</x-layouts.app>
