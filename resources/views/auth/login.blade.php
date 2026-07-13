<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SIMMAG Disdukcapil</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-[#062C30]">

    <div class="min-h-screen flex">

       <!-- Left Side -->
<div class="hidden lg:flex w-1/2 relative overflow-hidden">

    <!-- Background Image -->
    <img
    src="{{ asset('images/login-bg.jpg') }}"
    alt="Background SIMMAG"
    class="absolute inset-0 w-full h-full object-cover object-center">

    <!-- Overlay -->
    <div class="absolute inset-0 bg-[#062C30]/80"></div>

    <!-- Optional Gradient -->
    <div class="absolute inset-0 bg-gradient-to-br from-[#0A4B52]/80 via-[#0A4B52]/60 to-[#062C30]/90"></div>

    <!-- Content -->
    <div class="relative z-10 flex flex-col justify-center px-16 text-white">

        <div class="max-w-lg">

            <h1 class="text-5xl font-bold leading-tight">
                SIMMAG
            </h1>

            <p class="mt-3 text-cyan-100 text-lg">
                Sistem Informasi Magang Disdukcapil
            </p>

            <div class="mt-10">

                <h2 class="text-2xl font-semibold">
                    Selamat Datang 👋
                </h2>

                <p class="mt-4 leading-8 text-cyan-100">
                    Kelola proses magang mahasiswa mulai dari
                    pendaftaran, validasi, monitoring, hingga
                    laporan dalam satu sistem terintegrasi.
                </p>

            </div>

        </div>

    </div>

</div>
        <!-- Right Side -->
        <div class="w-full lg:w-1/2 flex justify-center items-center px-6 py-10">

            <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl p-10">

                <div class="text-center lg:text-left">

                    <h2 class="text-3xl font-bold text-[#062C30]">
                        Login
                    </h2>

                    <p class="mt-2 text-slate-500">
                        Silakan login menggunakan akun Anda.
                    </p>

                </div>

                {{-- Flash Message --}}
                @if(session('success'))
                    <div class="mt-5 rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Error Validasi --}}
                @if ($errors->any())
                    <div class="mt-5 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('login.authenticate') }}" method="POST" class="mt-8 space-y-5">

    @csrf

    {{-- Error Login --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-xl">
            {{ $errors->first() }}
        </div>
    @endif

    {{-- Email --}}
    <div>

        <label class="block text-sm font-medium text-slate-700 mb-2">
            Email
        </label>

        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="Masukkan email"
            required
            class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3 transition duration-300 text-black focus:outline-none focus:ring-4 focus:ring-cyan-200 focus:border-[#00B4B6] focus:bg-white">

    </div>

    {{-- Password --}}
    <div>

        <label class="block text-sm font-medium text-slate-700 mb-2">
            Password
        </label>

        <input
            type="password"
            name="password"
            placeholder="Masukkan password"
            required
            class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3 transition duration-300 text-black focus:outline-none focus:ring-4 focus:ring-cyan-200 focus:border-[#00B4B6] focus:bg-white">

    </div>

    {{-- Remember --}}
    <div class="flex justify-between items-center">

        <label class="flex items-center gap-2 text-sm">

            <input
                type="checkbox"
                name="remember"
                class="rounded border-slate-300">

            Ingat Saya

        </label>

        <a href="#" class="text-sm text-[#00B4B6] hover:text-[#00D1D4]">
            Lupa Password?
        </a>

    </div>

    <button
        type="submit"
        class="w-full bg-[#00B4B6] hover:bg-[#00D1D4] text-white py-3 rounded-xl font-semibold shadow-lg transition">

        Login

    </button>

</form>

                <!-- Divider -->
                <div class="relative my-6">

                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>

                    <div class="relative flex justify-center">
                        <span class="bg-white px-4 text-sm text-gray-500">
                            atau
                        </span>
                    </div>

                </div>

                <!-- Register -->
                <div class="text-center">

                    <p class="text-sm text-gray-600">
                        Belum memiliki akun?
                    </p>

                    <a href="{{ route('register') }}"
                        class="mt-4 inline-block w-full border-2 border-[#00B4B6] text-[#00B4B6] hover:bg-[#00B4B6] hover:text-white py-3 rounded-xl font-semibold transition duration-300">

                        Daftar Akun Mahasiswa

                    </a>

                </div>

                <div class="mt-8 text-center text-sm text-gray-500">

                    © {{ date('Y') }} SIMMAG Disdukcapil

                </div>

            </div>

        </div>

    </div>

</body>

</html>