<x-admin.layouts.app :title="__('Admin Login')">
    <section class="w-full h-screen grid place-content-center">
        <form action="{{ route('admin.login') }}" method="post" class="grid gap-3 w-sm">
            @csrf
            <flux:legend>Admin Login</flux:legend>
            <flux:input type="email" label="Email" name="email" />
            <flux:input type="password" label="Password" name="password" />
            <flux:button type="submit">Submit</flux:button>
        </form>
    </section>
</x-admin.layouts.app>