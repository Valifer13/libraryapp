<x-layouts.app :title="__('Books List')" :page="'user-books'">
    <section class="grid gap-3 place-content-center" style="grid-template-columns: repeat(auto-fill, minmax(170px, 1fr));">
        <livewire:book-card />
        <livewire:book-card />
        <livewire:book-card />
    </section>
</x-layouts.app>