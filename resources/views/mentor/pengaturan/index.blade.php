@extends('layouts.app')

@section('title', 'Pengaturan Mentor')

@section('sidebar')
    @include('layouts.sidebar.sidebar-mentor')
@endsection

@section('content')

<div class="space-y-6">

    <div>

        <h1 class="text-3xl font-bold text-white">
            Pengaturan
        </h1>

        <p class="text-textsecondary mt-2">
            Kelola informasi akun mentor.
        </p>

    </div>

    {{-- Informasi Akun --}}
    <x-ui.card>

        <h2 class="text-xl font-semibold text-white mb-6">
            Informasi Akun
        </h2>

        <div class="grid md:grid-cols-2 gap-6">

            <div>

                <label class="block mb-2 text-textsecondary">
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    value="{{ Auth::user()->name }}"
                    class="w-full bg-background border border-border rounded-lg px-4 py-3 text-white">

            </div>

            <div>

                <label class="block mb-2 text-textsecondary">
                    Email
                </label>

                <input
                    type="email"
                    value="{{ Auth::user()->email }}"
                    class="w-full bg-background border border-border rounded-lg px-4 py-3 text-white">

            </div>

            <div>

                <label class="block mb-2 text-textsecondary">
                    Nomor HP
                </label>

                <input
                    type="text"
                    placeholder="08xxxxxxxxxx"
                    class="w-full bg-background border border-border rounded-lg px-4 py-3 text-white">

            </div>

            <div>

                <label class="block mb-2 text-textsecondary">
                    Jabatan
                </label>

                <input
                    type="text"
                    value="Mentor"
                    readonly
                    class="w-full bg-background border border-border rounded-lg px-4 py-3 text-gray-400">

            </div>

        </div>

    </x-ui.card>

    {{-- Password --}}
    <x-ui.card>

        <h2 class="text-xl font-semibold text-white mb-6">
            Ubah Password
        </h2>

        <div class="space-y-5">

            <div>

                <label class="block mb-2 text-textsecondary">
                    Password Lama
                </label>

                <input
                    type="password"
                    class="w-full bg-background border border-border rounded-lg px-4 py-3 text-white">

            </div>

            <div>

                <label class="block mb-2 text-textsecondary">
                    Password Baru
                </label>

                <input
                    type="password"
                    class="w-full bg-background border border-border rounded-lg px-4 py-3 text-white">

            </div>

            <div>

                <label class="block mb-2 text-textsecondary">
                    Konfirmasi Password Baru
                </label>

                <input
                    type="password"
                    class="w-full bg-background border border-border rounded-lg px-4 py-3 text-white">

            </div>

        </div>

    </x-ui.card>

    <div class="flex justify-end">

        <button
            class="bg-primary hover:opacity-90 px-6 py-3 rounded-lg font-medium">

            Simpan Perubahan

        </button>

    </div>

</div>

@endsection