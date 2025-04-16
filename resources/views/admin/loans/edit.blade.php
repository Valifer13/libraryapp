<x-admin.layouts.app :title="__('Edit Loan')" :page="'admin-loans-edit'">
    <form action="/admin/loans/{{ $loan->id }}" method="post" class="grid gap-5">
        @csrf
        @method('put')
        <h1 class="text-xl font-medium">Edit loan number {{ $loan->id }}</h1>
        <div class="grid gap-2 max-w-sm">
            <label for="select-book" class="font-medium">Book</label>
            <select name="book_id" id="select-book" placeholder="Choose book..." autocomplete="off">
                <option value="">Choose book...</option>
                @foreach (App\Models\Book::all() as $book)
                    <option value="{{ $book->id }}" {{ $book->id == $loan->book->id ? 'selected' : '' }}>{{ $book->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="grid gap-2 max-w-sm">
            <label for="select-user" class="font-medium">User</label>
            <select name="user_id" id="select-user" placeholder="Choose user..." autocomplete="off">
                <option value="">Choose user...</option>
                @foreach (App\Models\User::all() as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $loan->user->id ? 'selected' : '' }}>{{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="grid gap-2 max-w-sm">
            <label for="select-admin" class="font-medium">Admin</label>
            <select name="admin_id" id="select-admin" placeholder="Choose admin..." autocomplete="off">
                <option value="">Choose admin...</option>
                @foreach (App\Models\Admin::all() as $admin)
                    <option value="{{ $admin->id }}" {{ $admin->id == $loan->admin->id ? 'selected' : '' }}>{{ $admin->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="max-w-lg grid grid-cols-2 gap-3">
            <flux:input type="date" label="Borrow Date" name="borrow_date" value="{{ $loan->borrow_date }}" />
            <flux:input type="date" label="Due Date" name="due_date" value="{{ $loan->due_date }}" />
            <flux:input type="date" label="Return Date" name="return_date" value="{{ $loan->return_date ?? '' }}" />
            <flux:select placeholder="Choose status" label="Status" name="status">
                @foreach ($statuses as $status)
                    @if ($status == $loan->status)
                        <flux:select.option value="{{ $status }}" selected>{{ Str::ucfirst($status) }}</flux:select.option>
                    @else
                        <flux:select.option value="{{ $status }}">{{ Str::ucfirst($status) }}</flux:select.option>
                    @endif
                @endforeach
            </flux:select>
        </div>
        <div class="flex gap-4">
            <flux:button as="a" href="/admin/loans">Cancel</flux:button>
            <flux:button type="submit" variant="primary">Submit</flux:button>
        </div>
    </form>
</x-admin.layouts.app>