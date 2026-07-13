@extends('layouts.app')

@section('title', 'Dashboard Operator')

@section('sidebar')
    @include('layouts.sidebar.sidebar-operator')
@endsection

@section('content')

<div class="space-y-6">

    <div>
        <h1 class="text-3xl font-bold text-white">
            Dashboard Operator
        </h1>

        <p class="text-textsecondary mt-2">
            Selamat datang, {{ Auth::user()->name }}.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <x-ui.card>
            <p class="text-textsecondary">Data Mahasiswa</p>

            <h2 class="text-4xl font-bold mt-3">
                120
            </h2>
        </x-ui.card>

        <x-ui.card>
            <p class="text-textsecondary">Data Belum Valid</p>

            <h2 class="text-4xl font-bold mt-3">
                18
            </h2>
        </x-ui.card>

        <x-ui.card>
            <p class="text-textsecondary">Data Sudah Valid</p>

            <h2 class="text-4xl font-bold mt-3">
                102
            </h2>
        </x-ui.card>

    </div>

    <x-ui.card>

        <h2 class="text-xl font-semibold mb-4">
            Aktivitas Terbaru
        </h2>

        <ul class="space-y-3 text-textsecondary">

            <li>• Mahasiswa melakukan registrasi.</li>

            <li>• Operator melakukan validasi data.</li>

            <li>• Data mahasiswa berhasil diperbarui.</li>

        </ul>

    </x-ui.card>

</div>

@endsection