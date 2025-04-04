<x-admin.layouts.app :title="__('Admin Dashboard')">
    <h1 class="text-2xl font-medium">Book Management</h1>
    <div class="flex justify-between items-center mt-5">
        <form action="{{ route('admin.book-manage') }}" method="get" class="max-w-xl">
            <flux:input icon="magnifying-glass" placeholder="Search books..." name="search"
                value="{{ request('search') }}" />
        </form>
        <div class="flex gap-3">
            <flux:dropdown>
                <flux:button icon:trailing="chevron-down">Options</flux:button>

                <flux:menu>
                    <div class="block lg:hidden">
                        <flux:menu.item icon="plus">New Book</flux:menu.item>

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
                <flux:button icon="plus" variant="primary">New Book</flux:button>
            </div>
        </div>
    </div>
    <div class="overflow-x-auto mt-3">
        <table class="min-w-full divide-y-2 divide-gray-200 dark:divide-zinc-700">
            <thead class="ltr:text-left rtl:text-right">
                <tr class="*:font-medium *:text-gray-900 dark:*:text-white">
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
                @foreach ($books as $book)
                <x-admin.book-list :book="$book" />
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin.layouts.app>