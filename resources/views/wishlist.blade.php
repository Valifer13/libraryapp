<x-layouts.app :title="__('Wishlist Book')">
    <section>
        <h1 class="text-2xl font-medium">Your Wishlist</h1>
        <div class="overflow-x-auto mt-5 rounded border border-zinc-300 shadow-sm dark:border-zinc-600">
            <table class="min-w-full divide-y-2 divide-zinc-200 dark:divide-zinc-700">
                <thead class="ltr:text-left rtl:text-right">
                    <tr class="*:font-medium *:text-zinc-900 dark:*:text-white">
                        <th class="px-3 py-2 whitespace-nowrap">#</th>
                        <th class="px-3 py-2 whitespace-nowrap">Cover</th>
                        <th class="px-3 py-2 whitespace-nowrap">Title</th>
                        <th class="px-3 py-2 whitespace-nowrap">Time</th>
                        <th class="px-3 py-2 whitespace-nowrap">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                    @forelse ($wishlists as $wishlist)
                        <tr class="*:text-zinc-900 *:first:font-medium dark:*:text-white">
                            <td class="px-3 py-2 whitespace-nowrap">{{ $loop->iteration }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <div class="max-w-[100px] drop-shadow-lg">
                                    <img src="{{ $wishlist->book->cover ? asset('storage/' . $wishlist->book->cover) : 'https://placehold.co/400x600' }}" alt="">
                                </div>
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <a href="/books/{{ $wishlist->book->slug }}" class="text-base font-medium cursor-pointer hover:underline">{{ $wishlist->book->title }}</a>
                                <h2 class="text-sm text-zinc-400">{{ $wishlist->book->author }}</h2>
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">{{ $wishlist->created_at->diffForHumans() }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <form action="/wishlists/{{ $wishlist->id }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <flux:button type="submit" class="bg-red-500! hover:bg-red-400!">Delete</flux:button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="*:text-zinc-900 *:first:font-medium dark:*:text-white">
                            <th colspan="4" class="px-3 py-2 whitespace-nowrap text-xl font-medium">You don't have
                                wishlists yet...</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</x-layouts.app>
