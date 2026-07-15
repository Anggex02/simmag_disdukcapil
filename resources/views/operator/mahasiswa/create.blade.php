@extends('layouts.app')

@section('title','Tambah Mahasiswa')

@section('sidebar')
@include('layouts.sidebar.sidebar-operator')
@endsection

@section('content')

<div class="max-w-5xl mx-auto space-y-6">

    <div>

        <h1 class="text-3xl font-bold text-white">
            Tambah Mahasiswa
        </h1>

        <p class="text-textsecondary mt-2">
            Tambahkan akun dan data mahasiswa secara manual.
        </p>

    </div>

    <form action="{{ route('mahasiswa.store') }}" method="POST">

        @csrf

        {{-- DATA AKUN --}}
        <div class="bg-card border border-bordercolor rounded-2xl p-6 mb-6">

            <h2 class="text-xl font-semibold mb-6">
                Data Akun
            </h2>

            <div class="grid grid-cols-2 gap-6">

                <div>
                    <label>Nama Lengkap</label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="w-full rounded-xl bg-background border border-bordercolor p-3">
                </div>

                <div>
                    <label>Email</label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="w-full rounded-xl bg-background border border-bordercolor p-3">
                </div>

                <div>
                    <label>Password</label>

                    <input
                        type="password"
                        name="password"
                        class="w-full rounded-xl bg-background border border-bordercolor p-3">
                </div>

                <div>
                    <label>Konfirmasi Password</label>

                    <input
                        type="password"
                        name="password_confirmation"
                        class="w-full rounded-xl bg-background border border-bordercolor p-3">
                </div>

            </div>

        </div>

        {{-- DATA MAHASISWA --}}
        <div class="bg-card border border-bordercolor rounded-2xl p-6 mb-6">

            <h2 class="text-xl font-semibold mb-6">
                Data Mahasiswa
            </h2>

            <div class="grid grid-cols-2 gap-6">

                <div>

                    <label>NIM</label>

                    <input
                        type="text"
                        name="nim"
                        value="{{ old('nim') }}"
                        class="w-full rounded-xl bg-background border border-bordercolor p-3">

                </div>

                <div>

                    <label>Universitas</label>

                    <input
                        type="text"
                        name="universitas"
                        value="{{ old('universitas') }}"
                        class="w-full rounded-xl bg-background border border-bordercolor p-3">

                </div>

                <div>

                    <label>Program Studi</label>

                    <input
                        type="text"
                        name="program_studi"
                        value="{{ old('program_studi') }}"
                        class="w-full rounded-xl bg-background border border-bordercolor p-3">

                </div>

                <div>

                    <label>Semester</label>

                    <input
                        type="number"
                        name="semester"
                        value="{{ old('semester') }}"
                        class="w-full rounded-xl bg-background border border-bordercolor p-3">

                </div>

                <div>

                    <label>No HP</label>

                    <input
                        type="text"
                        name="no_hp"
                        value="{{ old('no_hp') }}"
                        class="w-full rounded-xl bg-background border border-bordercolor p-3">

                </div>

                <div class="col-span-2">

                    <label>Alamat</label>

                    <textarea
                        name="alamat"
                        rows="4"
                        class="w-full rounded-xl bg-background border border-bordercolor p-3">{{ old('alamat') }}</textarea>

                </div>

            </div>

        </div>

        {{-- DATA MAGANG --}}
        <div class="bg-card border border-bordercolor rounded-2xl p-6">

            <h2 class="text-xl font-semibold mb-6">
                Data Magang
            </h2>

            <div>

                <label>Periode Magang</label>

                <select
                    name="periode_magang_id"
                    class="w-full rounded-xl bg-background border border-bordercolor p-3">

                    <option value="">
                        -- Pilih Periode --
                    </option>

                    @foreach($periode as $item)

                        <option
                            value="{{ $item->id }}">

                            {{ $item->nama_periode }}

                        </option>

                    @endforeach

                </select>

            </div>

        </div>

        <div class="flex justify-end gap-3 mt-8">

            <a
                href="{{ route('mahasiswa.index') }}"
                class="px-5 py-3 rounded-xl bg-gray-600 hover:bg-gray-700">

                Batal

            </a>

            <button
                type="submit"
                class="px-5 py-3 rounded-xl bg-primary hover:opacity-90 text-white">

                Simpan Mahasiswa

            </button>

        </div>

    </form>

</div>

@endsection