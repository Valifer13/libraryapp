<div
    class="group flex flex-col relative justify-center items-center w-full h-[300px] rounded-lg border bg-zinc-200 dark:bg-zinc-700 border-zinc-300 dark:border-zinc-500 hover:border-zinc-400 hover:bg-zinc-300 dark:hover:bg-zinc-600 transition">
    <a href="/books/{{ $book->slug }}" class="max-w-[100px] max-h-[160px] shadow-lg transition group-hover:scale-105 cursor-pointer">
        <img src="{{ $book->cover ? asset('storage/' . $book->cover) : 'https://placehold.co/400x600' }}"
            alt="">
    </a>
    <div class="w-full h-[100px]"></div>
    <div
        class="absolute grid bottom-0 box-border w-full min-h-[100px] rounded-lg border-t px-2 py-3 gap-1 transition bg-white dark:bg-zinc-800 border-zinc-300 dark:border-zinc-500 group-hover:border-zinc-400">
        <div class="flex flex-col gap-0.5">
            <a href="/books/{{ $book->slug }}" class="text-base font-medium hover:underline cursor-pointer">{{ Str::limit($book->title, 16) }}</a>
            <p class="text-xs text-zinc-500">{{ Str::limit($book->author, 20) }}</p>
        </div>
        <div class="flex justify-between items-center">
            <a href="/categories/{{ Str::lower($book->category->name) }}">
                <flux:badge as="button" size="sm" color="{{ substr($book->category->color, 3, -4) }}">{{ Str::limit($book->category->name, 13) }}</flux:badge>
            </a>
            <div class="flex gap-1 items-center text-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                </svg>
                <span class="text-sm">0</span>
            </div>
        </div>
    </div>
</div>