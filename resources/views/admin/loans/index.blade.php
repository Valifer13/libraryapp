<x-admin.layouts.app :title="__('Loan Management')">
    <h1 class="text-2xl font-medium">Loan Management</h1>
    <div class="flex justify-between items-center mt-5">
        <form action="/admin/loans" method="get" class="max-w-xl">
            <flux:input.group>
                <flux:input icon="magnifying-glass" placeholder="Search loans..." name="search"
                    value="{{ request('search') }}" />
                <flux:select class="max-w-fit" name="order">
                    <flux:select.option value="book" selected>Book</flux:select.option>
                    <flux:select.option value="user">User</flux:select.option>
                    <flux:select.option value="admin">Admin</flux:select.option>
                </flux:select>
            </flux:input.group>
        </form>
        <div class="flex gap-3">
            <flux:dropdown>
                <flux:button icon:trailing="chevron-down">Options</flux:button>

                <flux:menu>
                    <flux:menu.submenu heading="Sort by">
                        <flux:menu.radio.group>
                            <flux:menu.radio checked>Name</flux:menu.radio>
                            <flux:menu.radio>Date</flux:menu.radio>
                            <flux:menu.radio>Popularity</flux:menu.radio>
                        </flux:menu.radio.group>
                    </flux:menu.submenu>

                    <flux:menu.submenu heading="Status Filter">
                        <flux:menu.checkbox checked>Borrowed</flux:menu.checkbox>
                        <flux:menu.checkbox>Returned</flux:menu.checkbox>
                        <flux:menu.checkbox>Overdue</flux:menu.checkbox>
                    </flux:menu.submenu>
                </flux:menu>
            </flux:dropdown>
        </div>
    </div>
    <div class="overflow-x-auto mt-3">
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
    <ul class="flex justify-center gap-1 text-gray-900 dark:text-white mt-5">
        @if ($loans->currentPage() != 1)
            <li>
                <a href="{{ $loans->previousPageUrl() }}"
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
            <a href="{{ $loans->url(1) }}"
                class="block size-8 rounded border border-zinc-600 {{ $loans->currentPage() == 1 ? 'bg-zinc-600' : '' }} text-center text-sm/8 font-medium text-white">
                1
            </a>
        </li>

        <li
            class="{{ $loans->currentPage() > 4 ? 'block' : 'hidden' }} size-8 rounded border border-zinc-600 text-center text-sm/8 font-medium text-white">
            ...
        </li>

        @if ($loans->lastPage() == 1)
        <div></div>
        @elseif ($loans->currentPage() <= 3)
            @for ($i = 2; $i <= $loans->currentPage() + 2; $i++)
                <li>
                    <a href="{{ $loans->url($i) }}"
                        class="block size-8 rounded border border-zinc-600 {{ $loans->currentPage() == $i ? 'bg-zinc-600' : '' }} text-center text-sm/8 font-medium text-white">
                        {{ $i }}
                    </a>
                </li>
            @endfor
        @elseif ($loans->currentPage() >= $loans->lastPage() - 2)
            @for ($i = $loans->lastPage(); $i <= $loans->lastPage() - 2; $i++)
                <li>
                    <a href="{{ $loans->url($i) }}"
                        class="block size-8 rounded border border-zinc-600 {{ $loans->currentPage() == $i ? 'bg-zinc-600' : '' }} text-center text-sm/8 font-medium text-white">
                        {{ $i }}
                    </a>
                </li>
            @endfor
        @else
            @for ($i = $loans->currentPage() - 2; $i <= $loans->currentPage() + 2; $i++)
                <li>
                    <a href="{{ $loans->url($i) }}"
                        class="block size-8 rounded border border-zinc-600 {{ $loans->currentPage() == $i ? 'bg-zinc-600' : '' }} text-center text-sm/8 font-medium text-white">
                        {{ $i }}
                    </a>
                </li>
            @endfor
        @endif

        <li
            class="{{ $loans->currentPage() < ($loans->lastPage() - 3) ? 'block' : 'hidden' }} size-8 rounded border border-zinc-600 text-center text-sm/8 font-medium text-white">
            ...
        </li>

        @if ($loans->lastPage() >= 3)
        <li>
            <a href="{{ $loans->url($loans->lastPage()) }}"
                class="block size-8 rounded border border-zinc-600 {{ $loans->currentPage() == $loans->lastPage() ? 'bg-zinc-600' : '' }} text-center text-sm/8 font-medium text-white">
                {{ $loans->lastPage() }}
            </a>
        </li>
        @endif

        @if ($loans->currentPage() != $loans->lastPage())
            <li>
                <a href="{{ $loans->nextPageUrl() }}"
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