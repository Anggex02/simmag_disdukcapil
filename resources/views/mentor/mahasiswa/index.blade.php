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

                Daftar mahasiswa yang berada di bawah bimbingan Anda.

            </p>

        </div>

        <x-ui.card>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <input type="text" placeholder="Cari mahasiswa..."
                    class="w-full bg-background border border-border rounded-lg px-4 py-3 text-white">

                <select class="w-full bg-background border border-border rounded-lg px-4 py-3 text-white">

                    <option>Semua Status</option>
                    <option>Aktif</option>
                    <option>Selesai</option>
                    <option>Belum Magang</option>

                </select>

            </div>

        </x-ui.card>

        <x-ui.card>

            <div class="overflow-x-auto">

                <table class="w-full">

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

                        @forelse($mahasiswas as $mahasiswa)

                            <tr>

                                <td class="py-4">

                                    {{ $loop->iteration }}

                                </td>

                                <td>

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

                                    @php

                                        $warna = match ($mahasiswa->status) {

                                            'aktif' => 'bg-green-500/20 text-green-400',

                                            'selesai' => 'bg-blue-500/20 text-blue-400',

                                            default => 'bg-yellow-500/20 text-yellow-400'

                                        };

                                    @endphp

                                    <span class="px-3 py-1 rounded-full text-sm {{ $warna }}">

                                        {{ ucfirst(str_replace('_', ' ', $mahasiswa->status)) }}

                                    </span>

                                </td>

                                <td class="text-center">

                                    <a href="{{ route('mentor.mahasiswa.detail', $mahasiswa->id) }}"
                                        class="px-4 py-2 rounded-lg bg-primary text-white hover:opacity-90">

                                        Detail

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="text-center py-8 text-textsecondary">

                                    Belum ada mahasiswa.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </x-ui.card>

    </div>

@endsection