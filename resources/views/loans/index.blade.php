<x-layouts.app :title="__('Loans List')">
    <section>
        <h1 class="text-2xl font-medium">Your Loan List</h1>
        <div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y-2 divide-gray-200 dark:divide-gray-700">
                    <thead class="ltr:text-left rtl:text-right">
                        <tr class="*:font-medium *:text-gray-900 dark:*:text-white">
                            <th class="px-3 py-2 whitespace-nowrap">Book Title</th>
                            <th class="px-3 py-2 whitespace-nowrap">Borrow Date</th>
                            <th class="px-3 py-2 whitespace-nowrap">Due Date</th>
                            <th class="px-3 py-2 whitespace-nowrap">Status</th>
                        </tr>
                    </thead>

                    <tbody
                        class="divide-y divide-gray-200 *:even:bg-gray-50 dark:divide-gray-700 dark:*:even:bg-gray-800">
                        @foreach ($loans as $loan)
                            <tr class="*:text-gray-900 *:first:font-medium dark:*:text-white">
                                <td class="px-3 py-2 whitespace-nowrap">{{ $loan->book->title }}</td>
                                <td class="px-3 py-2 whitespace-nowrap">{{ $loan->borrow_date }}</td>
                                <td class="px-3 py-2 whitespace-nowrap">{{ $loan->due_date }}</td>
                                <td class="px-3 py-2 whitespace-nowrap">{{ $loan->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-layouts.app>
