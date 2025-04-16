<x-admin.layouts.app :title="__('Admin Dashboard')" :page="'admin-dashboard'">
    <h1 class="text-2xl font-medium mb-5">Hi, {{ auth()->user()->name }} 👋 Here's what today!</h1>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">

            <!-- Books Available Chart -->
            <article
                class="flex items-end justify-between rounded-lg border border-zinc-200 dark:border-zinc-600 bg-zinc-100 dark:bg-zinc-900 p-6">
                <div class="flex items-center gap-4">
                    <span
                        class="hidden rounded-full bg-violet-200 dark:bg-violet-500 p-2 text-zinc-900 dark:text-zinc-100 sm:block bg">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path
                                d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                        </svg>

                    </span>

                    <div>
                        <p class="text-sm text-gray-500">Books Available</p>

                        <p class="text-2xl font-medium text-zinc-900 dark:text-zinc-100">{{ $totalBooks }}</p>
                    </div>
                </div>

                <div class="inline-flex gap-2 rounded-sm bg-green-100 p-1 text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>

                    <span class="text-xs font-medium"> 67.81% </span>
                </div>
            </article>

            <!-- Books Borrowed Chart -->
            <article
                class="flex items-end justify-between rounded-lg border border-zinc-200 dark:border-zinc-600 bg-zinc-100 dark:bg-zinc-900 p-6">
                <div class="flex items-center gap-4">
                    <span
                        class="hidden rounded-full bg-blue-200 dark:bg-blue-500 p-2 text-zinc-900 dark:text-zinc-100 sm:block bg">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path
                                d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                        </svg>
                    </span>

                    <div>
                        <p class="text-sm text-gray-500">Books Borrowed</p>

                        <p class="text-2xl font-medium text-zinc-900 dark:text-zinc-100">{{ $totalLoans }}</p>
                    </div>
                </div>

                <div class="inline-flex gap-2 rounded-sm bg-green-100 p-1 text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>

                    <span class="text-xs font-medium"> 67.81% </span>
                </div>
            </article>

            <!-- Books Returned Chart -->
            <article
                class="flex items-end justify-between rounded-lg border border-zinc-200 dark:border-zinc-600 bg-zinc-100 dark:bg-zinc-900 p-6">
                <div class="flex items-center gap-4">
                    <span
                        class="hidden rounded-full bg-green-200 dark:bg-green-500 p-2 text-zinc-900 dark:text-zinc-100 sm:block bg">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd"
                                d="M9.53 2.47a.75.75 0 0 1 0 1.06L4.81 8.25H15a6.75 6.75 0 0 1 0 13.5h-3a.75.75 0 0 1 0-1.5h3a5.25 5.25 0 1 0 0-10.5H4.81l4.72 4.72a.75.75 0 1 1-1.06 1.06l-6-6a.75.75 0 0 1 0-1.06l6-6a.75.75 0 0 1 1.06 0Z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>

                    <div>
                        <p class="text-sm text-gray-500">Books Returned</p>

                        <p class="text-2xl font-medium text-zinc-900 dark:text-zinc-100">{{ $totalReturns }}</p>
                    </div>
                </div>

                <div class="inline-flex gap-2 rounded-sm bg-green-100 p-1 text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>

                    <span class="text-xs font-medium"> 67.81% </span>
                </div>
            </article>
        </div>
        <div
            class="relative h-fit flex-1 rounded-xl border border-neutral-200 dark:border-neutral-700 bg-zinc-100 dark:bg-zinc-900">
            <canvas id="visitorChart"></canvas>
        </div>
    </div>
</x-admin.layouts.app>