@extends('layouts.app')

@section('title', 'Mahasiswa Bimbingan')

@section('sidebar')
    @include('layouts.sidebar.sidebar-mentor')
@endsection

@section('content')

    <div class="space-y-6">

        <div>
            <h1 class="text-3xl font-bold text-white">
                Mahasiswa Bimbingan
            </h1>

            <p class="text-textsecondary mt-2">
                Daftar mahasiswa yang sedang berada di bawah bimbingan Anda.
            </p>
        </div>

        {{-- Search & Filter --}}
        <x-ui.card>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <input type="text" placeholder="Cari mahasiswa..."
                    class="w-full bg-background border border-border rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-primary">

                <select
                    class="w-full bg-background border border-border rounded-lg px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-primary">

                    <option>Semua Status</option>
                    <option>Aktif</option>
                    <option>Selesai</option>
                    <option>Nonaktif</option>

                </select>

            </div>

        </x-ui.card>

        {{-- Table --}}
        <x-ui.card>

            <div class="overflow-x-auto">

                <table class="w-full text-left">

                    <thead>

                        <tr class="border-b border-border text-textsecondary">

                            <th class="py-3">No</th>

                            <th>Nama</th>

                            <th>Universitas</th>

                            <th>Program Studi</th>

                            <th>Periode</th>

                            <th>Status</th>

                            <th class="text-center">Aksi</th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-border">

                        @forelse($mahasiswas as $index => $mahasiswa)

                            <tr>

                                <td class="py-4">
                                    {{ $index + 1 }}
                                </td>

                                <td class="font-medium text-white">
                                    {{ $mahasiswa->user->name }}
                                </td>

                                <td>
                                    {{ $mahasiswa->universitas }}
                                </td>

                                <td>
                                    {{ $mahasiswa->jurusan }}
                                </td>

                                <td>
                                    {{ optional($mahasiswa->periodeMagang)->nama ?? '-' }}
                                </td>

                                <td>

                                    @if($mahasiswa->status == 'aktif')

                                        <span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full text-sm">
                                            Aktif
                                        </span>

                                    @elseif($mahasiswa->status == 'selesai')

                                        <span class="bg-blue-500/20 text-blue-400 px-3 py-1 rounded-full text-sm">
                                            Selesai
                                        </span>

                                    @else

                                        <span class="bg-yellow-500/20 text-yellow-400 px-3 py-1 rounded-full text-sm">
                                            {{ ucfirst($mahasiswa->status) }}
                                        </span>

                                    @endif

                                </td>

                                <td class="text-center">

                                    <a href="{{ route('mentor.mahasiswa.detail', $mahasiswa->id) }}"
                                        class="bg-primary hover:opacity-90 text-white px-4 py-2 rounded-lg">

                                        Detail

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="text-center py-6 text-gray-400">

                                    Belum ada mahasiswa bimbingan.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </x-ui.card>

    </div>

@endsection