@extends('layouts.app')

@section('title','Detail Mahasiswa')

@section('sidebar')
@include('layouts.sidebar.sidebar-mentor')
@endsection

@section('content')

<div class="space-y-6">

    <x-ui.card>

        <h1 class="text-2xl font-bold mb-6">

            Detail Mahasiswa

        </h1>

        <div class="grid grid-cols-2 gap-6">

            <div>

                <p class="text-textsecondary">Nama</p>

                <h2 class="font-semibold">

                    {{ $mahasiswa->user->name }}

                </h2>

            </div>

            <div>

                <p class="text-textsecondary">Email</p>

                <h2 class="font-semibold">

                    {{ $mahasiswa->user->email }}

                </h2>

            </div>

            <div>

                <p class="text-textsecondary">NIM</p>

                <h2 class="font-semibold">

                    {{ $mahasiswa->nim }}

                </h2>

            </div>

            <div>

                <p class="text-textsecondary">Universitas</p>

                <h2 class="font-semibold">

                    {{ $mahasiswa->universitas }}

                </h2>

            </div>

            <div>

                <p class="text-textsecondary">Jurusan</p>

                <h2 class="font-semibold">

                    {{ $mahasiswa->jurusan }}

                </h2>

            </div>

            <div>

                <p class="text-textsecondary">No HP</p>

                <h2 class="font-semibold">

                    {{ $mahasiswa->no_hp }}

                </h2>

            </div>

            <div class="col-span-2">

                <p class="text-textsecondary">

                    Alamat

                </p>

                <h2 class="font-semibold">

                    {{ $mahasiswa->alamat }}

                </h2>

            </div>

            <div>

                <p class="text-textsecondary">

                    Status

                </p>

                <span class="px-3 py-1 rounded-lg bg-green-600 text-white">

                    {{ $mahasiswa->status }}

                </span>

            </div>

            <div>

                <p class="text-textsecondary">

                    Total Logbook

                </p>

                <h2 class="font-semibold">

                    {{ $mahasiswa->logbooks->count() }}

                </h2>

            </div>

        </div>

    </x-ui.card>

    <a href="{{ route('mentor.logbook.show',$mahasiswa->id) }}"
    class="px-5 py-3 bg-primary rounded-xl text-white">

        Lihat Logbook

    </a>

</div>

@endsection