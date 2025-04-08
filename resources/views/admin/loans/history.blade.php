<x-admin.layouts.loans :loans="$loans">
    <div class="overflow-x-auto mt-5">
        <table class="min-w-full divide-y-2 divide-gray-200 dark:divide-zinc-700">
            <thead class="ltr:text-left rtl:text-right">
                <tr class="*:font-medium *:text-gray-900 dark:*:text-white">
                    <th class="px-3 py-2 whitespace-nowrap">#</th>
                    <th class="px-3 py-2 whitespace-nowrap">Book</th>
                    <th class="px-3 py-2 whitespace-nowrap">User</th>
                    <th class="px-3 py-2 whitespace-nowrap">Admin</th>
                    <th class="px-3 py-2 whitespace-nowrap">Borrow</th>
                    <th class="px-3 py-2 whitespace-nowrap">Due</th>
                    <th class="px-3 py-2 whitespace-nowrap">Return</th>
                    <th class="px-3 py-2 whitespace-nowrap">Status</th>
                    <th class="px-3 py-2 whitespace-nowrap">Options</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 dark:divide-zinc-700">
                @if ($loans->count())
                    @foreach ($loans as $loan)
                        <x-admin.loan-list :loan="$loan" :iter="__(($loans->currentPage() - 1) * $loans->perPage() + $loop->iteration)" />
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">
                            <h1 class="text-xl font-medium text-center my-5">No loan found!</h1>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-admin.layouts.loans>