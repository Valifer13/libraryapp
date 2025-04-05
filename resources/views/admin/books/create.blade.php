<x-admin.layouts.app :title="__('Add New Book')">
    <form action="/admin/books" method="post">
        @csrf
        <flux:fieldset>
            <flux:legend>Add New Book</flux:legend>

            <div class="space-y-6">
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
                <flux:input type="file" wire:model="cover" label="Cover" name="cover" />

                <div class="flex gap-4 justify-end">
                    <flux:button href="/admin/books">Cancel</flux:button>
                    <flux:button variant="primary" type="submit">Submit</flux:button>
                </div>
            </div>
        </flux:fieldset>
    </form>
</x-admin.layouts.app>