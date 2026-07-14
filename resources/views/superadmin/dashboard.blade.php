@extends('layouts.app')

@section('title', 'Dashboard Super Admin')

@section('sidebar')
    @include('layouts.sidebar.sidebar-superadmin')
@endsection

@section('content')

<div class="space-y-8">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">

        <div>

            <h1 class="text-3xl font-bold text-white">
                Dashboard
            </h1>

            <p class="text-textsecondary mt-2">
                Selamat datang di Sistem Informasi Magang Disdukcapil.
            </p>

        </div>

        <div class="mt-4 md:mt-0">

            <span class="px-4 py-2 rounded-xl bg-primary text-white shadow-card">

                {{ now()->translatedFormat('l, d F Y') }}

            </span>

        </div>

    </div>

    {{-- Statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        {{-- Operator --}}
        <div class="bg-card rounded-2xl p-6 shadow-card border border-bordercolor">

            <p class="text-textsecondary">
                Total Operator
            </p>

            <h2 class="text-4xl font-bold mt-3">
               {{ $totalOperator }}
            </h2>

        </div>

        {{-- Periode --}}
        <div class="bg-card rounded-2xl p-6 shadow-card border border-bordercolor">

            <p class="text-textsecondary">
                Periode Magang
            </p>

            <h2 class="text-4xl font-bold mt-3">
                {{ $totalPeriode }}
            </h2>

        </div>

        {{-- Mentor --}}
        <div class="bg-card rounded-2xl p-6 shadow-card border border-bordercolor">

            <p class="text-textsecondary">
                Mentor
            </p>

            <h2 class="text-4xl font-bold mt-3">
                {{ $totalMentor }}
            </h2>

        </div>

        {{-- Mahasiswa --}}
        <div class="bg-card rounded-2xl p-6 shadow-card border border-bordercolor">

            <p class="text-textsecondary">
                Mahasiswa
            </p>

            <h2 class="text-4xl font-bold mt-3">
                {{ $totalMahasiswa }}
            </h2>

        </div>

    </div>

    {{-- Aktivitas --}}
    <div class="bg-card rounded-2xl shadow-card border border-bordercolor">

        <div class="border-b border-bordercolor px-6 py-4">

            <h2 class="font-semibold text-lg">

                Aktivitas Terbaru

            </h2>

        </div>

        <div class="divide-y divide-bordercolor">

            <div class="px-6 py-4 flex justify-between">

                <span>
                    Operator baru ditambahkan
                </span>

                <span class="text-textsecondary text-sm">
                    5 menit lalu
                </span>

            </div>

            <div class="px-6 py-4 flex justify-between">

                <span>
                    Periode Magang dibuka
                </span>

                <span class="text-textsecondary text-sm">
                    1 jam lalu
                </span>

            </div>

            <div class="px-6 py-4 flex justify-between">

                <span>
                    Mentor melakukan validasi
                </span>

                <span class="text-textsecondary text-sm">
                    Hari ini
                </span>

            </div>

        </div>

    </div>

</div>

@endsection