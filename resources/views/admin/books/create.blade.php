<x-admin.layouts.app :title="__('Add New Book')">
    <h1 class="text-2xl font-medium">Add New Book</h1>
    <form action="/admin/books" method="post" enctype="multipart/form-data" class="mt-5">
        @csrf
        <flux:fieldset>
            <div class="space-y-6 border border-zinc-200 dark:border-zinc-400 px-3 py-4 rounded-lg bg-zinc-100 dark:bg-zinc-900">
                <flux:input label="Title" placeholder="Book title..." name="title" class="max-w-sm" />
                <flux:input label="Author" placeholder="Book author..." name="author" class="max-w-sm" />

                <div class="grid grid-cols-2 gap-x-4 gap-y-6">
                    <flux:input label="ISBN" placeholder="Book number..." name="isbn" />
                    <flux:input label="Published Year" placeholder="Published year..." name="published_year" />
                    <flux:input label="Stock" placeholder="Stock Book..." name="stock" />
                    <flux:select wire:model="category" placeholder="Choose category..." label="Category" name="category">
                        @foreach ($categories as $category)
                            <flux:select.option value="{{ $category->id }}">{{ $category->name }}</flux:select.option>
                        @endforeach
                    </flux:select>
                </div>

                <flux:textarea placeholder="Book description..." label="Description" class="max-w-md" name="description" />
                <flux:input type="file" label="Cover" name="cover" />

                <div class="flex gap-4 justify-end">
                    <flux:button href="/admin/books" icon="arrow-uturn-left">Cancel</flux:button>
                    <flux:button type="submit" icon="plus" class="bg-blue-400! hover:bg-blue-300! dark:bg-blue-500! dark:hover:bg-blue-400!">Add Book</flux:button>
                </div>
            </div>
        </flux:fieldset>
    </form>
</x-admin.layouts.app>