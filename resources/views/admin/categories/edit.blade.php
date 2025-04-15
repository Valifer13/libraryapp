<x-admin.layouts.app :title="__('Edit Category')">
    <h1 class="text-2xl font-medium">Edit Category {{ $category->name }}</h1>
    <div class="max-w-lg mt-5 px-3 py-4 rounded-lg border border-zinc-300 dark:border-zinc-400 bg-zinc-100 dark:bg-zinc-900">
        <form action="/admin/categories" method="post" class="grid gap-5">
            @csrf
            @method('put')
            <flux:input placeholder="Category name..." label="Name" name="name" class="max-w-sm" value="{{ $category->name }}" />
            <flux:input placeholder="Red" label="Color" name="color" class="max-w-sm" value="{{ ucfirst(substr($category->color, 3, -4)) }}" />
            <div class="flex justify-end gap-3">
                <flux:button icon="arrow-uturn-left" as="a" href="/admin/categories">Cancel</flux:button>
                <flux:button variant="primary" type="submit" icon="plus">Create</flux:button>
            </div>
        </form>
    </div>
</x-admin.layouts.app>