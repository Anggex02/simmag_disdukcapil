<div class="flex flex-col h-full">

    {{-- Logo --}}
    <div class="px-6 py-6 border-b border-border">

        <h1 class="text-2xl font-bold text-primary">
            SIMMAG
        </h1>

        <p class="text-sm text-textsecondary mt-1">
            Mentor Panel
        </p>

    </div>

    {{-- Menu --}}
    <nav class="flex-1 px-4 py-6 space-y-2">

        {{-- Dashboard --}}
        <a href="{{ route('mentor.dashboard') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition
            {{ request()->routeIs('mentor.dashboard') ? 'bg-primary text-white' : 'text-textsecondary hover:bg-card hover:text-white' }}">

            <span class="material-symbols-outlined">
                dashboard
            </span>

            Dashboard

        </a>

        {{-- Mahasiswa --}}
        <a href="{{ route('mentor.mahasiswa') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition
            {{ request()->routeIs('mentor.mahasiswa*') ? 'bg-primary text-white' : 'text-textsecondary hover:bg-card hover:text-white' }}">

            <span class="material-symbols-outlined">
                groups
            </span>

            Mahasiswa

        </a>

        {{-- Logbook --}}
        <a href="{{ route('mentor.logbook') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition
            {{ request()->routeIs('mentor.logbook*') ? 'bg-primary text-white' : 'text-textsecondary hover:bg-card hover:text-white' }}">

            <span class="material-symbols-outlined">
                menu_book
            </span>

            Logbook

        </a>

        {{-- Absensi --}}
        <a href="{{ route('mentor.absensi') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition
            {{ request()->routeIs('mentor.absensi*') ? 'bg-primary text-white' : 'text-textsecondary hover:bg-card hover:text-white' }}">

            <span class="material-symbols-outlined">
                fact_check
            </span>

            Absensi

        </a>

        {{-- Pengaturan --}}
        <a href="{{ route('mentor.pengaturan') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition
            {{ request()->routeIs('mentor.pengaturan*') ? 'bg-primary text-white' : 'text-textsecondary hover:bg-card hover:text-white' }}">

            <span class="material-symbols-outlined">
                settings
            </span>

            Pengaturan

        </a>

    </nav>

    {{-- Footer --}}
    <div class="border-t border-border p-4">

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="w-full flex items-center justify-center gap-2 bg-red-500 hover:bg-red-600 text-white rounded-xl py-3 transition">

                <span class="material-symbols-outlined">
                    logout
                </span>

                Logout

            </button>

        </form>

    </div>

</div>