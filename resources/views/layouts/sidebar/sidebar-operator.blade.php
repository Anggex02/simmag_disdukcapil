<aside class="hidden lg:flex flex-col w-72 bg-sidebar border-r border-bordercolor min-h-screen">

    {{-- Logo --}}
    <div class="h-20 flex items-center px-6 border-b border-bordercolor">

        <h1 class="text-4xl font-bold text-primary">
           Operator
        </h1>

    </div>

    {{-- Menu --}}
    <nav class="flex-1 px-4 py-6 space-y-2">

        <a href="{{ route('operator.dashboard') }}"
            class="flex items-center px-4 py-3 rounded-xl transition
            {{ request()->routeIs('operator.dashboard') ? 'bg-primary text-white' : 'hover:bg-card' }}">

            Dashboard

        </a>

        <p class="text-xs uppercase text-textsecondary mt-6 mb-2 px-4">
            Manajemen
        </p>

        <a  href="{{ route('mahasiswa.index') }}"
            class="flex items-center px-4 py-3 rounded-xl transition
            {{ request()->routeIs('mahasiswa.*') ? 'bg-primary text-white' : 'hover:bg-card' }}">

            Data Mahasiswa

        </a>

        <a href="{{ route('periode-magang.index') }}"
            class="flex items-center px-4 py-3 rounded-xl transition
            {{ request()->routeIs('periode-magang.*') ? 'bg-primary text-white' : 'hover:bg-card' }}">

            Periode Magang

        </a>

        <a href="{{ route('operator.validasi') }}"
            class="flex items-center px-4 py-3 rounded-xl transition
            {{ request()->routeIs('operator.validasi') ? 'bg-primary text-white' : 'hover:bg-card' }}">

            Validasi Berkas

        </a>


    {{-- User --}}
    <div class="border-t border-bordercolor p-5">

        <div class="font-semibold text-white">
            {{ Auth::user()->name }}
        </div>

        <div class="text-sm text-textsecondary">
            {{ Auth::user()->email }}
        </div>

        <form action="{{ route('logout') }}" method="POST" class="mt-4">
            @csrf

            <button
                class="w-full bg-red-500 hover:bg-red-600 rounded-xl py-2 text-white">

                Logout

            </button>

        </form>

    </div>

</aside>