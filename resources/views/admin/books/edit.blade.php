<x-admin.layouts.app :title="__('Edit Book')">
    <h1 class="text-2xl font-medium">Edit book with ID {{ $book->id }}</h1>
    <form action="/admin/books/{{ $book->id }}" method="post" class="mt-5">
        @csrf
        @method('put')
        <flux:fieldset>
            <div class="space-y-6 border border-zinc-500 dark:border-zinc-400 px-3 py-4 rounded-lg bg-zinc-100 dark:bg-zinc-900">
                <flux:input label="Title" placeholder="Book title..." name="title" class="max-w-sm"
                    value="{{ $book->title }}" />
                <flux:input label="Author" placeholder="Book author..." name="author" class="max-w-sm"
                    value="{{ $book->author }}" />

                <div class="grid grid-cols-2 gap-x-4 gap-y-6">
                    <flux:input label="ISBN" placeholder="Book number..." name="isbn" value="{{ $book->isbn }}" />
                    <flux:input label="Published Year" placeholder="Published year..." name="published_year"
                        value="{{ $book->published_year }}" />
                    <flux:input label="Stock" placeholder="Stock Book..." name="stock" value="{{ $book->stock }}" />
                    <flux:select wire:model="category" label="Category"
                        name="category" clearable>
                        @foreach ($categories as $category)
                            @if($category->id == $book->category_id)
                            <flux:select.option value="{{ $category->id }}" selected>
                                {{ $category->name }}
                            </flux:select.option>
                            @else
                            <flux:select.option value="{{ $category->id }}">
                                {{ $category->name }}
                            </flux:select.option>
                            @endif
                        @endforeach
                    </flux:select>
                </div>

                <flux:textarea placeholder="Book description..." label="Description" class="max-w-md"
                    name="description">
                    {{ $book->description }}
                </flux:textarea>
                <flux:input type="file" wire:model="cover" label="Cover" name="cover" />

                <div class="flex gap-4 justify-end">
                    <flux:button href="{{ url()->previous() }}" icon="arrow-uturn-left">Cancel</flux:button>
                    <flux:button type="submit" icon="arrow-up-on-square" class="bg-blue-400! hover:bg-blue-300! dark:bg-blue-500! dark:hover:bg-blue-400!">Update</flux:button>
                </div>
            </div>
        </flux:fieldset>
    </form>
</x-admin.layouts.app>