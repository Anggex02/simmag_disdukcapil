<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | SIMMAG Disdukcapil</title>

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
        <div class="hidden lg:flex w-1/2 bg-[#0A4B52] text-white items-center justify-center p-16">

            <div class="max-w-md">

                <h1 class="text-5xl font-bold leading-tight">
                    SIMMAG
                </h1>

                <p class="mt-3 text-cyan-100 text-lg">
                    Sistem Informasi Magang Disdukcapil
                </p>

                <div class="mt-10">

                    <h2 class="text-2xl font-semibold">
                        Bergabung Bersama Kami 🚀
                    </h2>

                    <p class="mt-4 leading-7 text-cyan-100">
                        Daftarkan akun mahasiswa untuk mengajukan magang,
                        memantau proses seleksi, mengisi logbook, dan melihat
                        hasil penilaian secara online.
                    </p>

                </div>

            </div>

        </div>

        <!-- Right Side -->
        <div class="w-full lg:w-1/2 flex justify-center items-center px-6 py-10">

            <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl p-10">

                <div class="text-center lg:text-left">

                    <h2 class="text-3xl font-bold text-[#062C30]">
                        Register
                    </h2>

                    <p class="mt-2 text-slate-500">
                        Silakan lengkapi data untuk membuat akun mahasiswa.
                    </p>

                </div>

                {{-- Error Validasi --}}
                @if ($errors->any())
                    <div class="mt-5 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register.store') }}" method="POST" class="mt-8 space-y-5">

                    @csrf

                    <!-- Nama -->

                    <div>

                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Masukkan nama lengkap"
                            class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3 transition duration-300 focus:outline-none focus:ring-4 focus:ring-cyan-200 focus:border-[#00B4B6] focus:bg-white">

                    </div>

                    <!-- Email -->

                    <div>

                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Masukkan email"
                            class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3 transition duration-300 focus:outline-none focus:ring-4 focus:ring-cyan-200 focus:border-[#00B4B6] focus:bg-white">

                    </div>

                    <!-- Password -->

                    <div>

                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            placeholder="Masukkan password"
                            class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3 transition duration-300 focus:outline-none focus:ring-4 focus:ring-cyan-200 focus:border-[#00B4B6] focus:bg-white">

                    </div>

                    <!-- Konfirmasi Password -->

                    <div>

                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Konfirmasi Password
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            placeholder="Ulangi password"
                            class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3 transition duration-300 focus:outline-none focus:ring-4 focus:ring-cyan-200 focus:border-[#00B4B6] focus:bg-white">

                    </div>

                    <!-- Button -->

                    <button
                        type="submit"
                        class="w-full bg-[#00B4B6] hover:bg-[#00D1D4] text-white py-3 rounded-xl font-semibold shadow-lg transition duration-300">

                        Daftar

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

                <!-- Login -->

                <div class="text-center">

                    <p class="text-sm text-gray-600">
                        Sudah memiliki akun?
                    </p>

                    <a href="{{ route('login') }}"
                        class="mt-4 inline-block w-full border-2 border-[#00B4B6] text-[#00B4B6] hover:bg-[#00B4B6] hover:text-white py-3 rounded-xl font-semibold transition duration-300">

                        Login Sekarang

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