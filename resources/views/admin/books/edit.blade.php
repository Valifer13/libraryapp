<x-admin.layouts.app :title="__('Edit Book')">
    <form action="/admin/books/{{ $book->id }}" method="post">
        @csrf
        @method('put')
        <flux:fieldset>
            <flux:legend>Edit Book</flux:legend>

            <div class="space-y-6">
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
                    <flux:button href="{{ url()->previous() }}">Cancel</flux:button>
                    <flux:button variant="primary" type="submit">Submit</flux:button>
                </div>
            </div>
        </flux:fieldset>
    </form>
</x-admin.layouts.app>