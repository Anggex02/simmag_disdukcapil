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
                S
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

    {{-- Tengah --}}
    <div class="hidden md:flex flex-1 justify-center px-10">

        <input
            type="text"
            placeholder="Cari..."
            class="w-full max-w-md bg-card border border-bordercolor rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary">

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
                W
            </div>

            <div class="hidden md:block">

                <p class="text-sm font-medium">
                    Wildan
                </p>

                <p class="text-xs text-textsecondary">
                    Super Admin
                </p>

            </div>

        </div>

    </div>

</nav>