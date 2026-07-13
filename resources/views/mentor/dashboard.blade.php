@extends('layouts.app')

@section('title', 'Dashboard Mentor')

@section('sidebar')
    @include('layouts.sidebar.sidebar-mentor')
@endsection

@section('content')

<div class="space-y-6">

    <div>

        <h1 class="text-3xl font-bold text-white">

            Dashboard Mentor

        </h1>

        <p class="text-textsecondary mt-2">

            Selamat datang, {{ Auth::user()->name }}.

        </p>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <x-ui.card>

            <p class="text-textsecondary">

                Mahasiswa Bimbingan

            </p>

            <h2 class="text-4xl font-bold mt-3">

                15

            </h2>

        </x-ui.card>

        <x-ui.card>

            <p class="text-textsecondary">

                Berkas Menunggu Validasi

            </p>

            <h2 class="text-4xl font-bold mt-3">

                4

            </h2>

        </x-ui.card>

        <x-ui.card>

            <p class="text-textsecondary">

                Laporan Selesai

            </p>

            <h2 class="text-4xl font-bold mt-3">

                11

            </h2>

        </x-ui.card>

    </div>

    <x-ui.card>

        <h2 class="text-xl font-semibold mb-4">

            Aktivitas Mentor

        </h2>

        <ul class="space-y-3 text-textsecondary">

            <li>• Validasi berkas mahasiswa.</li>

            <li>• Review logbook harian.</li>

            <li>• Memberikan penilaian magang.</li>

        </ul>

    </x-ui.card>

</div>

@endsection