@extends('layouts.app')

@section('title', 'Detail Mahasiswa')

@section('sidebar')
    @include('layouts.sidebar.sidebar-mentor')
@endsection

@section('content')

<div class="space-y-6">

    <div>

        <h1 class="text-3xl font-bold text-primary">

            Detail Mahasiswa

        </h1>

        <p class="text-primary mt-2">

            Informasi lengkap mahasiswa bimbingan.

        </p>

    </div>

    <x-ui.card>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <label class="text-textsecondary">Nama</label>

                <div class="mt-2 text-lg font-semibold text-white">

                    {{ $mahasiswa->user->name }}

                </div>
            </div>

            <div>
                <label class="text-textsecondary">Email</label>

                <div class="mt-2">

                    {{ $mahasiswa->user->email }}

                </div>
            </div>

            <div>
                <label class="text-textsecondary">NIM</label>

                <div class="mt-2">

                    {{ $mahasiswa->nim }}

                </div>
            </div>

            <div>
                <label class="text-textsecondary">Universitas</label>

                <div class="mt-2">

                    {{ $mahasiswa->universitas }}

                </div>
            </div>

            <div>
                <label class="text-textsecondary">Program Studi</label>

                <div class="mt-2">

                    {{ $mahasiswa->jurusan }}

                </div>
            </div>

            <div>
                <label class="text-textsecondary">No HP</label>

                <div class="mt-2">

                    {{ $mahasiswa->no_hp }}

                </div>
            </div>

            <div class="md:col-span-2">
                <label class="text-textsecondary">Alamat</label>

                <div class="mt-2">

                    {{ $mahasiswa->alamat }}

                </div>
            </div>

            <div>
                <label class="text-textsecondary">Mentor</label>

                <div class="mt-2">

                    {{ optional($mahasiswa->mentor)->nama ?? '-' }}

                </div>
            </div>

            <div>
                <label class="text-textsecondary">Periode Magang</label>

                <div class="mt-2">

                    {{ optional($mahasiswa->periodeMagang)->nama ?? '-' }}

                </div>
            </div>

        </div>

    </x-ui.card>

    <div class="grid md:grid-cols-3 gap-6">

        <x-ui.card>

            <p class="text-textsecondary">

                Total Logbook

            </p>

            <h2 class="text-4xl font-bold mt-3">

                {{ $mahasiswa->logbooks_count }}

            </h2>

        </x-ui.card>

        <x-ui.card>

            <p class="text-textsecondary">

                Status

            </p>

            <h2 class="text-xl font-bold mt-3">

                {{ ucfirst(str_replace('_',' ',$mahasiswa->status)) }}

            </h2>

        </x-ui.card>

        <x-ui.card>

            <p class="text-textsecondary">

                Aksi Cepat

            </p>

            <div class="mt-4">

                <a
                    href="{{ route('mentor.logbook.detail',$mahasiswa->id) }}"
                    class="inline-block bg-primary hover:opacity-90 text-white px-4 py-2 rounded-lg">

                    Lihat Logbook

                </a>

            </div>

        </x-ui.card>

    </div>

</div>

@endsection