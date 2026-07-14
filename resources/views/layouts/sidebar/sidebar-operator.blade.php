<nav class="bg-white shadow-md w-64 min-h-screen">

    <!-- Logo -->
    <div class="p-6 border-b">
        <a href="{{ route('operator.dashboard') }}" class="text-2xl font-bold text-blue-600">
            SIMMAG
        </a>
    </div>

    <!-- Menu -->
    <div class="mt-4">

        <a href="{{ route('operator.dashboard') }}"
            class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
            🏠
            <span class="ml-3">Dashboard</span>
        </a>

        <a href="{{ route('periode-magang.index') }}"
            class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
            📅
            <span class="ml-3">Periode Magang</span>
        </a>

        <a href="{{ route('operator.validasi') }}"
            class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
            📂
            <span class="ml-3">Validasi Berkas</span>
        </a>

    </div>

    <!-- User -->
    <div class="absolute bottom-0 w-64 border-t p-4">

        <div class="mb-3">
            <div class="font-semibold">
                {{ Auth::user()->name }}
            </div>

            <div class="text-sm text-gray-500">
                {{ Auth::user()->email }}
            </div>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button
                type="submit"
                class="w-full bg-red-500 hover:bg-red-600 text-white py-2 rounded-lg">
                Logout
            </button>
        </form>

    </div>

</nav>