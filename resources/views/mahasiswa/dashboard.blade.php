@extends('layouts.app')

@section('title', 'Dashboard Mahasiswa')

@section('sidebar')
    @include('layouts.sidebar.sidebar-mahasiswa')
@endsection

@section('content')

<div class="space-y-6">

    <div>

        <h1 class="text-3xl font-bold text-white">

            Dashboard Mahasiswa

        </h1>

        <p class="text-textsecondary mt-2">

            Selamat datang, {{ Auth::user()->name }}.

        </p>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        <x-ui.card>

            <p class="text-textsecondary">

                Lowongan Tersedia

            </p>

            <h2 class="text-4xl font-bold mt-3">

                20

            </h2>

        </x-ui.card>

        <x-ui.card>

            <p class="text-textsecondary">

                Lamaran Saya

            </p>

            <h2 class="text-4xl font-bold mt-3">

                2

            </h2>

        </x-ui.card>

        <x-ui.card>

            <p class="text-textsecondary">

                Logbook

            </p>

            <h2 class="text-4xl font-bold mt-3">

                30

            </h2>

        </x-ui.card>

        <x-ui.card>

            <p class="text-textsecondary">

                Pengumuman

            </p>

            <h2 class="text-4xl font-bold mt-3">

                5

            </h2>

        </x-ui.card>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <x-ui.card>

            <h2 class="text-xl font-semibold mb-4">

                Status Magang

            </h2>

            <div class="space-y-4">

                <div class="flex justify-between">

                    <span>Status Lamaran</span>

                    <x-ui.badge color="green">

                        Diterima

                    </x-ui.badge>

                </div>

                <div class="flex justify-between">

                    <span>Mentor</span>

                    <span>Budi Santoso</span>

                </div>

                <div class="flex justify-between">

                    <span>Periode</span>

                    <span>Juli - Desember 2026</span>

                </div>

            </div>

        </x-ui.card>

        <x-ui.card>

            <h2 class="text-xl font-semibold mb-4">

                Aktivitas Terbaru

            </h2>

            <ul class="space-y-3 text-textsecondary">

                <li>• Mengisi Logbook Harian.</li>

                <li>• Melihat Pengumuman Baru.</li>

                <li>• Lamaran telah disetujui.</li>

            </ul>

        </x-ui.card>

    </div>

</div>

@endsection