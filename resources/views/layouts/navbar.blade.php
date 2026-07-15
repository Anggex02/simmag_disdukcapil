<nav class="h-16 bg-sidebar border-b border-bordercolor shadow-card flex items-center justify-between px-6">

    {{-- Kiri --}}
    <div class="flex items-center gap-4">

        {{-- Hamburger (Mobile) --}}
        <button class="lg:hidden text-white">
            ☰
        </button>

        {{-- Logo --}}
        <div class="flex items-center gap-3">

            <div class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center font-bold text-lg text-white">
                <img src="{{ asset('images/logo.png') }}">
            </div>

            <div>
                <h1 class="text-lg font-semibold">
                    SIMMAG
                </h1>

                <p class="text-xs text-textsecondary">
                    Disdukcapil
                </p>
            </div>

        </div>

    </div>


    {{-- Kanan --}}
    <div class="flex items-center gap-5">

        {{-- Notifikasi --}}
        <button class="relative">

            🔔

            <span class="absolute -top-1 -right-2 w-2 h-2 rounded-full bg-danger"></span>

        </button>

        {{-- User --}}
        <div class="flex items-center gap-3 cursor-pointer">

            <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center font-semibold">
                {{ strtoupper(substr(Auth::user()->name ?? 'U',0,1)) }}
            </div>

            <div class="hidden md:block">

                <p class="text-sm font-medium">
                    {{ Auth::user()->name ?? 'Guest' }}
                </p>

                <p class="text-xs text-textsecondary">
                    {{ ucfirst(Auth::user()->role ?? '-') }}
                </p>

            </div>

        </div>

    </div>

</nav>