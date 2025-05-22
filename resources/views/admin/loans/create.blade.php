<x-admin.layouts.app :title="__('Add Loans')" :page="'admin-loans-create'">
    <section>
        <h1 class="text-2xl font-medium">Add New Loan</h1>

        <form action="/admin/loans" method="post">
            @csrf
            <div class="grid gap-5 max-w-sm mt-5">
                <div class="">
                    <label for="select-book" class="font-medium">Book</label>
                    <select name="book_id" id="select-book" placeholder="Choose book..." autocomplete="off">
                        <option value="">Choose book...</option>
                        @foreach ($books as $book)
                            <option value="{{ $book->id }}">
                                {{ $book->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="">
                    <label for="select-user" class="font-medium">User</label>
                    <select name="user_id" id="select-user" placeholder="Choose user..." autocomplete="off">
                        <option value="">Choose User...</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="">
                    <label for="select-admin" class="font-medium">Admin</label>
                    <select name="admin_id" id="select-admin" placeholder="Choose admin..." autocomplete="off">
                        <option value="">Choose admin...</option>
                        @foreach ($admins as $admin)
                            <option value="{{ $admin->id }}"
                                {{ $admin->id === auth()->user()->id ? 'selected' : '' }}>
                                {{ $admin->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="max-w-lg grid grid-cols-2 gap-5 mt-5">
                <flux:input type="date" label="Borrow Date" name="borrow_date" value="{{ now()->toDateString() }}" />
                <flux:input type="date" label="Due Date" name="due_date" value="{{ now()->addDays(7)->toDateString() }}" />
                <flux:input type="date" label="Return Date" name="return_date" />
                <flux:select placeholder="Choose status" label="Status" name="status">
                    @foreach ($statuses as $status)
                        @if ($status == 'borrowed')
                            <flux:select.option value="{{ $status }}" selected>{{ Str::ucfirst($status) }}
                            </flux:select.option>
                        @else
                            <flux:select.option value="{{ $status }}">{{ Str::ucfirst($status) }}
                            </flux:select.option>
                        @endif
                    @endforeach
                </flux:select>
            </div>
            <div class="flex gap-4 mt-5">
                <flux:button as="a" href="/admin/loans">Cancel</flux:button>
                <flux:button type="submit" variant="primary">Submit</flux:button>
            </div>
        </form>
    </section>
</x-admin.layouts.app>
