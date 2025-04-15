<x-admin.layouts.app :title="__('Book Category Management')">
    <h1 class="text-2xl font-medium">Book Category Management</h1>

    <div
        class="mt-5 p-3 rounded-lg flex justify-between bg-zinc-100 dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-400">
        <form action="/admin/categories" method="get">
            <flux:input icon="magnifying-glass" placeholder="Search category..." class="max-w-xs" />
        </form>
        <flux:button as="a" href="/admin/categories/create" icon="plus"><span class="hidden md:block">Add
                Category</span></flux:button>
    </div>

    <div class="mt-5">
        <h6 class="text-sm text-zinc-400">Total data loaded: {{ $categories->count() }}</h6>
    </div>

    <div
        class="overflow-x-auto mt-5 p-3 rounded-lg border border-zinc-300 dark:border-zinc-400 bg-zinc-100 dark:bg-zinc-900">
        <table class="min-w-full divide-y-2 divide-zinc-200 dark:divide-zinc-700">
            <thead class="ltr:text-left rtl:text-right">
                <tr
                    class="*:font-medium *:text-zinc-900 *:first:sticky *:first:left-0 *:first:bg-zinc-100 dark:*:text-white dark:*:first:bg-zinc-900">
                    <th class="px-3 py-2 whitespace-nowrap">Name</th>
                    <th class="px-3 py-2 whitespace-nowrap">Color</th>
                    <th class="px-3 py-2 whitespace-nowrap">Book</th>
                    <th class="px-3 py-2 whitespace-nowrap">Action</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                @foreach ($categories as $category)
                    <tr
                        class="*:text-zinc-900 *:first:sticky *:first:left-0 *:first:bg-zinc-100 *:first:font-medium dark:*:text-white dark:*:first:bg-zinc-900">
                        <td class="px-3 py-2 whitespace-nowrap">{{ $category->name }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <flux:badge color="{{ substr($category->color, 3, -4) }}">
                                {{ ucfirst(substr($category->color, 3, -4)) }}
                            </flux:badge>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ $category->books->count() }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <flux:dropdown>
                                <flux:button icon="ellipsis-horizontal"></flux:button>

                                <flux:menu>
                                    <flux:menu.item href="/admin/categories/{{ $category->id }}/edit" icon="pencil"
                                        class="hover:text-yellow-400!">Edit
                                    </flux:menu.item>
                                    <flux:menu.item href="/admin/categories/{{ $category->id }}" icon="magnifying-glass"
                                        class="hover:text-blue-500!">
                                        Detail</flux:menu.item>
                                    <form action="/admin/categories/{{ $category->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <flux:menu.item icon="trash" variant="danger" type="submit">Delete</flux:menu.item>
                                    </form>
                                </flux:menu>
                            </flux:dropdown>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin.layouts.app>