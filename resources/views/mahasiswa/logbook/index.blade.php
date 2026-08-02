@extends('layouts.app')

@section('title', 'Logbook')

@section('sidebar')
    @include('layouts.sidebar.sidebar-mahasiswa')
@endsection

@section('content')

    <div class="space-y-6">

        <div>

            <h1 class="text-3xl font-bold text-primary">
                Logbook
            </h1>

            <p class="text-primary">
                Isi aktivitas harian selama magang.
            </p>

        </div>

        @if(session('success'))

            <div class="bg-green-500/20 border border-green-500 rounded-xl p-4 text-green-300">

                {{ session('success') }}

            </div>

        @endif

        <div class="bg-card rounded-2xl border border-bordercolor p-6">

            <form action="{{ route('mahasiswa.logbook.store') }}" method="POST">

                @csrf

                <div class="grid md:grid-cols-2 gap-4">

                    <input type="date" name="tanggal"
                        class="bg-background border border-bordercolor rounded-xl p-3 text-primary">

                    <input type="text" name="kegiatan" placeholder="Kegiatan"
                        class="bg-background border border-bordercolor rounded-xl p-3 text-primary">

                    <textarea name="hasil_pekerjaan" placeholder="Hasil pekerjaan"
                        class="bg-background border border-bordercolor rounded-xl p-3 text-primary md:col-span-2"></textarea>

                    <textarea name="kendala" placeholder="Kendala (opsional)"
                        class="bg-background border border-bordercolor rounded-xl p-3 text-primary md:col-span-2"></textarea>

                </div>

                <div class="mt-5 text-right">

                    <button class="bg-primary px-5 py-3 rounded-xl text-white">

                        Tambah Logbook

                    </button>

                </div>

            </form>

        </div>

        <div class="bg-card rounded-2xl border border-bordercolor overflow-hidden">

            <table class="w-full">

                <thead class="bg-background border-b border-bordercolor">

                    <tr>

                        <th class="px-6 py-4 text-primary text-left">Tanggal</th>

                        <th class="px-6 py-4 text-primary text-left">Kegiatan</th>

                        <th class="px-6 py-4 text-primary text-center">Status</th>

                        <th class="px-6 py-4 text-primary text-center">Komentar Mentor</th>

                        <th class="px-6 py-4 text-primary text-center">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($logbooks as $logbook)

                        <tr class="border-b border-bordercolor hover:bg-black/10 transition">

                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($logbook->tanggal)->format('d M Y') }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $logbook->kegiatan }}
                            </td>

                            <td class="px-6 py-4 text-center">

                                @php
                                    $warna = match ($logbook->status) {
                                        'disetujui' => 'bg-green-500/20 text-green-400',
                                        'revisi' => 'bg-yellow-500/20 text-yellow-400',
                                        default => 'bg-blue-500/20 text-blue-400',
                                    };
                                @endphp

                                <span class="px-3 py-1 rounded-full text-sm {{ $warna }}">
                                    {{ ucfirst($logbook->status) }}
                                </span>

                            </td>

                            <td class="px-6 py-4 text-center">
                                {{ $logbook->komentar_mentor ?: '-' }}
                            </td>

                            <td class="px-6 py-4 text-center">

                                @if($logbook->status != 'disetujui')

                                    <form action="{{ route('mahasiswa.logbook.destroy', $logbook->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button class="bg-red-500 hover:bg-red-600 px-3 py-2 rounded-lg text-white">

                                            Hapus

                                        </button>

                                    </form>

                                @else

                                    <span class="text-textsecondary">-</span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center py-10">

                                Belum ada logbook.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection