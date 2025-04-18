<x-layouts.app.sidebar :title="$title ?? null" :page="$page ?? 'default'">
    <flux:main>
        {{ $slot }}
    </flux:main>
</x-layouts.app.sidebar>