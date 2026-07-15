<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register | SIMMAG</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body class="bg-background font-[Inter]">

    <div class="min-h-screen flex items-center justify-center px-6">

        <div class="bg-card border border-bordercolor rounded-3xl shadow-card p-10 w-full max-w-xl">

            <h1 class="text-3xl font-bold text-center mb-2 text-white">

                Register

            </h1>

            <p class="text-center text-textsecondary mb-8">

                Buat akun baru SIMMAG

            </p>

            <form action="{{ route('register.store') }}" method="POST" class="space-y-5">

                @csrf

                <div>
                <label class="block mb-2 text-white">Nama Lengkap</label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="w-full rounded-xl bg-background border border-bordercolor px-4 py-3 text-white"
                    required>
                </div>

                <div>
                <label class="block mb-2 text-white">Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full rounded-xl bg-background border border-bordercolor px-4 py-3 text-white"
                    required>
                </div>

                <div>
                <label class="block mb-2 text-white">Username</label>

                <input
                    type="text"
                    name="username"
                    value="{{ old('username') }}"
                    class="w-full rounded-xl bg-background border border-bordercolor px-4 py-3 text-white"
                    required>
                </div>

                <div>
                <label class="block mb-2 text-white">Password</label>

                <input
                    type="password"
                    name="password"
                    class="w-full rounded-xl bg-background border border-bordercolor px-4 py-3 text-white"
                    required>
                </div>

                <div>
                <label class="block mb-2 text-white">Konfirmasi Password</label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="w-full rounded-xl bg-background border border-bordercolor px-4 py-3 text-white"
                    required>
                </div>

                <button type="submit"
                    class="w-full bg-primary hover:opacity-90 py-3 rounded-xl font-semibold text-white">

                    Daftar

                </button>

            </form>

            <div class="mt-6 text-center text-textsecondary">

                Sudah punya akun?

                <a href="{{ route('login') }}" class="text-primary font-semibold">

                    Login

                </a>

            </div>

        </div>

    </div>

</body>

</html>