<aside class="hidden lg:flex flex-col w-72 bg-sidebar border-r border-bordercolor min-h-screen">

    {{-- Header --}}
    <div class="h-16 flex items-center px-6 border-b border-bordercolor">

        <h2 class="text-xl font-bold">
            Super Admin
        </h2>

    </div>

    {{-- Menu --}}
    <nav class="flex-1 px-4 py-6 space-y-2">

        {{-- Dashboard --}}
       <a href="{{ route('superadmin.dashboard') }}"
class="flex items-center px-4 py-3 rounded-xl transition
{{ request()->routeIs('superadmin.dashboard') ? 'bg-primary text-white' : 'hover:bg-card' }}">
    Dashboard
</a>

        {{-- Manajemen --}}
        <p class="text-xs uppercase text-textsecondary mt-6 mb-2 px-4">
            Manajemen
        </p>

        <a href="{{ route('operator.index') }}"
    class="flex items-center px-4 py-3 rounded-xl hover:bg-card transition">

    Data Operator

</a>



        {{-- Monitoring --}}
        <p class="text-xs uppercase text-textsecondary mt-6 mb-2 px-4">
            Monitoring
        </p>

        <a href="#"
            class="flex items-center px-4 py-3 rounded-xl hover:bg-card transition">

            Log Aktivitas

        </a>

        <a href="#"
            class="flex items-center px-4 py-3 rounded-xl hover:bg-card transition">

            Laporan

        </a>

        {{-- System --}}
        <p class="text-xs uppercase text-textsecondary mt-6 mb-2 px-4">
            System
        </p>

        <a href="#"
            class="flex items-center px-4 py-3 rounded-xl hover:bg-card transition">

            Pengaturan

        </a>

    </nav>

    {{-- Logout --}}
    <div class="p-4 border-t border-bordercolor">

        <a href="#"
            class="block w-full text-center bg-danger hover:bg-red-600 py-3 rounded-xl font-medium transition">

            Logout

        </a>

    </div>

</aside>