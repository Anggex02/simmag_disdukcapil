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
                        Selamat Datang 👋
                    </h2>

                    <p class="mt-4 leading-7 text-cyan-100">
                        Kelola proses magang mahasiswa mulai dari
                        pendaftaran, validasi, monitoring, hingga laporan
                        dalam satu sistem terintegrasi.
                    </p>

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

                <form action="{{ route('login.authenticate') }}" method="POST" class="mt-8 space-y-5">

                    @csrf

                    <div>

                        <label class="block text-sm font-medium text-slate-700 mb-2">
                            Username / Email
                        </label>

                        <input type="text" name="username" placeholder="Masukkan username"
                            class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3 transition duration-300 focus:outline-none focus:ring-4 focus:ring-cyan-200 focus:border-[#00B4B6] focus:bg-white"
                            </div>

                        <div>

                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                Password
                            </label>

                            <input type="password" name="password" placeholder="Masukkan password"
                                class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3 transition duration-300 focus:outline-none focus:ring-4 focus:ring-cyan-200 focus:border-[#00B4B6] focus:bg-white"
                                </div>

                            <div class="flex justify-between items-center">

                                <label class="flex items-center gap-2 text-sm">

                                    <input type="checkbox" class="rounded border-slate-300">

                                    Ingat Saya

                                </label>

                                <a href="#" class="text-sm text-[#00B4B6] hover:text-[#00D1D4] transition">
                                    Lupa Password?
                                </a>

                            </div>

                            <button type="submit"
                                class="w-full bg-[#00B4B6] hover:bg-[#00D1D4] text-white py-3 rounded-xl font-semibold shadow-lg transition duration-300"="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-xl font-semibold transition">

                                Login

                            </button>

                </form>

                <div class="mt-8 text-center text-sm text-gray-500">

                    © {{ date('Y') }} SIMMAG Disdukcapil

                </div>

            </div>

        </div>

    </div>

</body>

</html>