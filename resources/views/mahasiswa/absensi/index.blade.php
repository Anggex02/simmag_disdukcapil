@extends('layouts.app')

@section('title','Absensi')

@section('sidebar')
    @include('layouts.sidebar.sidebar-mahasiswa')
@endsection

@section('content')

<div class="space-y-6">

    <div>
        <h1 class="text-3xl font-bold text-primary">
            Absensi Magang
        </h1>

        <p class="text-primary mt-2">
            Lakukan absensi setiap hari selama kegiatan magang.
        </p>
    </div>

    @if(session('success'))
        <div class="bg-green-500/20 border border-green-500 rounded-xl p-4 text-green-300">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-500/20 border border-red-500 rounded-xl p-4 text-red-300">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-card rounded-2xl border border-bordercolor p-6">

        <div class="flex gap-4">

            <form action="{{ route('mahasiswa.absensi.masuk') }}" method="POST">
                @csrf

                <button
                    class="bg-green-600 hover:bg-green-700 px-5 py-3 rounded-xl font-semibold">

                    Absen Masuk

                </button>

            </form>

            <form action="{{ route('mahasiswa.absensi.pulang') }}" method="POST">
                @csrf

                <button
                    class="bg-red-600 hover:bg-red-700 px-5 py-3 rounded-xl font-semibold">

                    Absen Pulang

                </button>

            </form>

        </div>

    </div>

    <div class="bg-card rounded-2xl border border-bordercolor overflow-hidden">

        <table class="w-full">

            <thead class="bg-sidebar">

                <tr>

                    <th class="px-5 py-4 text-left">Tanggal</th>

                    <th class="px-5 py-4 text-left">Masuk</th>

                    <th class="px-5 py-4 text-left">Pulang</th>

                    <th class="px-5 py-4 text-left">Status</th>

                </tr>

            </thead>

            <tbody>

                @forelse($absensis as $absen)

                    <tr class="border-t border-bordercolor">

                        <td class="px-5 py-4">
                            {{ \Carbon\Carbon::parse($absen->tanggal)->format('d M Y') }}
                        </td>

                        <td class="px-5 py-4">
                            {{ $absen->jam_masuk ?? '-' }}
                        </td>

                        <td class="px-5 py-4">
                            {{ $absen->jam_keluar ?? '-' }}
                        </td>

                        <td class="px-5 py-4">

                            <span class="bg-green-600 px-3 py-1 rounded-full">

                                {{ ucfirst($absen->status) }}

                            </span>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="text-center py-10">

                            Belum ada absensi.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection