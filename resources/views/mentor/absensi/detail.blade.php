@extends('layouts.app')

@section('title', 'Riwayat Absensi')

@section('sidebar')
    @include('layouts.sidebar.sidebar-mentor')
@endsection

@section('content')

<div class="space-y-6">

    <div>

        <h1 class="text-3xl font-bold text-white">

            Riwayat Absensi

        </h1>

        <p class="text-textsecondary mt-2">

            {{ $mahasiswa->user->name }}

        </p>

    </div>

    <x-ui.card>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="border-b border-border text-textsecondary">

                        <th>No</th>

                        <th>Tanggal</th>

                        <th>Jam Masuk</th>

                        <th>Jam Keluar</th>

                        <th>Status</th>

                        <th>Keterangan</th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-border">

                    @forelse($absensis as $absensi)

                        <tr>

                            <td class="py-4">

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                {{ \Carbon\Carbon::parse($absensi->tanggal)->format('d M Y') }}

                            </td>

                            <td>

                                {{ $absensi->jam_masuk ?? '-' }}

                            </td>

                            <td>

                                {{ $absensi->jam_keluar ?? '-' }}

                            </td>

                            <td>

                                @php

                                    $warna = match($absensi->status){

                                        'hadir' => 'bg-green-500/20 text-green-400',

                                        'izin' => 'bg-yellow-500/20 text-yellow-400',

                                        'sakit' => 'bg-blue-500/20 text-blue-400',

                                        default => 'bg-red-500/20 text-red-400'

                                    };

                                @endphp

                                <span class="px-3 py-1 rounded-full {{ $warna }}">

                                    {{ ucfirst($absensi->status) }}

                                </span>

                            </td>

                            <td>

                                {{ $absensi->keterangan ?? '-' }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center py-8 text-textsecondary">

                                Belum ada data absensi.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </x-ui.card>

</div>

@endsection