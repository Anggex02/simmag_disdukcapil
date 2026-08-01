@extends('layouts.app')

@section('title', 'Dashboard Mahasiswa')

@section('sidebar')
    @include('layouts.sidebar.sidebar-mahasiswa')
@endsection

@section('content')

    <div class="space-y-6">

        {{-- Header --}}
        <div>
            <h1 class="text-3xl font-bold text-primary">
                Dashboard Mahasiswa
            </h1>

            <p class="text-primary mt-2">
                Selamat datang, {{ Auth::user()->name }}.
            </p>
        </div>

        {{-- Statistik --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

            <a href="{{ route('mahasiswa.pendaftaran.index') }}">
                <x-ui.card class="hover:scale-105 transition cursor-pointer">

                    <p class="text-textsecondary">
                        Lowongan Tersedia
                    </p>

                    <h2 class="text-4xl font-bold mt-3">
                        {{ $lowongan }}
                    </h2>

                </x-ui.card>
            </a>

            <a href="{{ route('mahasiswa.pendaftaran.index') }}">
                <x-ui.card class="hover:scale-105 transition cursor-pointer">

                    <p class="text-textsecondary">
                        Lamaran Saya
                    </p>

                    <h2 class="text-4xl font-bold mt-3">
                        {{ $lamaran }}
                    </h2>

                </x-ui.card>
            </a>

            <a href="{{ route('mahasiswa.logbook.index') }}">

                <x-ui.card class="hover:scale-105 transition cursor-pointer">

                    <p class="text-textsecondary">
                        Logbook
                    </p>

                    <h2 class="text-4xl font-bold mt-3">
                        {{ $jumlahLogbook }}
                    </h2>

                </x-ui.card>

            </a>

            <a href="{{ route('mahasiswa.pengumuman.index') }}">

                <x-ui.card class="hover:scale-105 transition cursor-pointer">

                    <p class="text-textsecondary">
                        Pengumuman
                    </p>

                    <h2 class="text-4xl font-bold mt-3">
                        0
                    </h2>

                </x-ui.card>

            </a>

        </div>


        {{-- Mentor Pembimbing --}}
        <x-ui.card>

            <h2 class="text-xl font-semibold mb-5">
                Mentor Pembimbing
            </h2>

            @if($mahasiswa && $mahasiswa->mentor)

                <div class="grid md:grid-cols-2 gap-6">

                    <div>
                        <p class="text-textsecondary text-sm">
                            Nama Mentor
                        </p>

                        <p class="text-lg font-semibold text-white mt-1">
                            {{ $mahasiswa->mentor->nama }}
                        </p>
                    </div>

                    <div>
                        <p class="text-textsecondary text-sm">
                            Jabatan
                        </p>

                        <p class="text-lg font-semibold text-white mt-1">
                            {{ $mahasiswa->mentor->jabatan }}
                        </p>
                    </div>

                    <div>
                        <p class="text-textsecondary text-sm">
                            Nomor HP
                        </p>

                        <p class="text-lg font-semibold text-white mt-1">
                            {{ $mahasiswa->mentor->no_hp }}
                        </p>
                    </div>

                    <div class="flex items-end">

                        <a href="https://wa.me/{{ preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $mahasiswa->mentor->no_hp)) }}"
                            target="_blank" class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-xl transition">

                            Hubungi via WhatsApp

                        </a>

                    </div>

                </div>

            @else

                <div class="text-center py-8">

                    <div class="text-5xl mb-3">
                        👨‍🏫
                    </div>

                    <p class="text-textsecondary">
                        Mentor pembimbing belum ditentukan oleh operator.
                    </p>

                </div>

            @endif

        </x-ui.card>
        {{-- Status Magang --}}
        <x-ui.card>

            <h2 class="text-xl font-semibold mb-5">
                Status Magang
            </h2>

            @if($pendaftaran)

                <div class="space-y-4">

                    <div class="flex justify-between">

                        <span>Status Lamaran</span>

                        @if($pendaftaran->status == 'menunggu')

                            <span class="bg-yellow-500 text-white px-3 py-1 rounded-full">
                                Menunggu
                            </span>

                        @elseif($pendaftaran->status == 'diterima')

                            <span class="bg-green-500 text-white px-3 py-1 rounded-full">
                                Diterima
                            </span>

                        @else

                            <span class="bg-red-500 text-white px-3 py-1 rounded-full">
                                Ditolak
                            </span>

                        @endif

                    </div>

                    <div class="flex justify-between">

                        <span>Periode</span>

                        <span>
                            {{ $pendaftaran->periodeMagang->nama_periode }}
                        </span>

                    </div>

                </div>

            @else

                <p class="text-gray-400">
                    Anda belum mengajukan pendaftaran magang.
                </p>

            @endif

        </x-ui.card>

        {{-- Aktivitas --}}
        <x-ui.card>

            <h2 class="text-xl font-semibold mb-4">
                Aktivitas Terbaru
            </h2>

            <ul class="space-y-3 text-textsecondary">

                <li>• Belum ada aktivitas.</li>

            </ul>

        </x-ui.card>

    </div>

@endsection