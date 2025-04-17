<x-layouts.app.sidebar :title="$title ?? null" :page="$page ?? 'default'">
    <flux:main class="{{ url()->current() === url('/books') ? 'lg:p-0! p-1!' : '' }}">
        {{ $slot }}
    </flux:main>
</x-layouts.app.sidebar>