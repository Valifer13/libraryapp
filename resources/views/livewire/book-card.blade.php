<div class="group relative flex flex-col overflow-hidden w-48 md:w-64 h-full border border-zinc-200">
    <button
        class="absolute end-4 top-4 z-10 rounded-full bg-white p-1.5 text-gray-900 transition hover:text-gray-900/75 cursor-pointer">
        <span class="sr-only">Wishlist</span>

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
        </svg>
    </button>

    <div class="h-60 md:h-52 w-full bg-zinc-100 grid place-content-center overflow-hidden">
        <img src="{{ $cover ?? 'https://placehold.co/250x400' }}" alt=""
            class="group-hover:scale-105 transition" width="120" height="200" />
    </div>

    <div
        class="flex flex-col justify-between grow gap-2 relative border-t border-t-zinc-200 bg-white dark:border-zinc-500 dark:bg-zinc-900 p-3">
        <div class="flex w-full justify-between items-center">
            <flux:badge variant="pill" color="{{ substr($category->color, 3, -4) }}">{{ $category->name }}
            </flux:badge>
            <span class="text-xs text-zinc-500">Like: {{ $liked }}</span>
        </div>

        <h3 class="text-lg font-medium text-gray-900">{{ Str::limit($title, 25) }}</h3>

        <p class="text-xs text-gray-700">{{ $author }}</p>

        <form class="">
            <flux:button icon="magnifying-glass" class="w-full! bg-blue-500! hover:bg-blue-400!">Detail
            </flux:button>
        </form>
    </div>
</div>