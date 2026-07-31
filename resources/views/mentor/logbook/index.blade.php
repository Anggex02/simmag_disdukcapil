@extends('layouts.app')

@section('title', 'Logbook Mahasiswa')

@section('sidebar')
    @include('layouts.sidebar.sidebar-mentor')
@endsection

@section('content')

<div class="space-y-6">

    <div>

        <h1 class="text-3xl font-bold text-white">
            Logbook Mahasiswa
        </h1>

        <p class="text-textsecondary">
            Daftar logbook mahasiswa bimbingan.
        </p>

    </div>

    {{-- Search --}}
    <div class="bg-card border border-bordercolor rounded-2xl p-6">

        <input
            type="text"
            placeholder="Cari mahasiswa..."
            class="w-full rounded-xl bg-background border border-bordercolor px-4 py-3 text-white">

    </div>

    {{-- Table --}}
    <div class="bg-card border border-bordercolor rounded-2xl overflow-hidden">

        <table class="w-full">

            <thead>

                <tr class="border-b border-bordercolor text-left">

                    <th class="px-8 py-5">No</th>

                    <th>Nama</th>

                    <th>NIM</th>

                    <th>Universitas</th>

                    <th class="text-center">Jumlah Logbook</th>

                    <th class="text-right pr-8">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($mahasiswas as $mahasiswa)

                    <tr class="border-b border-bordercolor last:border-b-0 hover:bg-background/30 transition">

                        <td class="px-8 py-6">

                            {{ $loop->iteration }}

                        </td>

                        <td class="font-medium">

                            {{ $mahasiswa->user->name }}

                        </td>

                        <td>

                            {{ $mahasiswa->nim }}

                        </td>

                        <td>

                            {{ $mahasiswa->universitas }}

                        </td>

                        <td class="text-center">

                            <span
                                class="inline-flex items-center justify-center min-w-[42px] h-8 rounded-full bg-primary/20 text-primary font-semibold">

                                {{ $mahasiswa->logbooks_count }}

                            </span>

                        </td>

                        <td class="text-right pr-8">

                            <a href="{{ route('mentor.logbook.detail',$mahasiswa->id) }}"
                                class="bg-primary hover:bg-primary/90 text-white px-5 py-2 rounded-lg transition">

                                Detail

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="py-10 text-center text-textsecondary">

                            Belum ada mahasiswa.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection