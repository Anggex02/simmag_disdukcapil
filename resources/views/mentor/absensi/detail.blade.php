@extends('layouts.app')

@section('title', 'Riwayat Absensi')

@section('sidebar')
    @include('layouts.sidebar.sidebar-mentor')
@endsection

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div>

        <h1 class="text-3xl font-bold text-primary">
            Riwayat Absensi
        </h1>

        <p class="mt-2 text-primary">
            {{ $mahasiswa->user->name }}
        </p>

    </div>

    {{-- Card --}}
    <div class="bg-card border border-bordercolor rounded-2xl overflow-hidden shadow-card">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="border-b border-bordercolor text-textsecondary">

                        <th class="w-16 py-4 text-center">
                            No
                        </th>

                        <th class="px-6 text-center">
                            Tanggal
                        </th>

                        <th class="px-6 text-center">
                            Jam Masuk
                        </th>

                        <th class="px-6 text-center">
                            Jam Keluar
                        </th>

                        <th class="px-6 text-center">
                            Status
                        </th>

                        <th class="px-6 text-left">
                            Keterangan
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-bordercolor">

                    @forelse($absensis as $absensi)

                        <tr class="hover:bg-black/10 transition">

                            <td class="py-5 text-center">

                                {{ $loop->iteration }}

                            </td>

                            <td class="text-center text-white">

                                {{ \Carbon\Carbon::parse($absensi->tanggal)->format('d M Y') }}

                            </td>

                            <td class="text-center text-white">

                                {{ $absensi->jam_masuk ?? '-' }}

                            </td>

                            <td class="text-center text-white">

                                {{ $absensi->jam_keluar ?? '-' }}

                            </td>

                            <td class="text-center">

                                @php

                                    $warna = match($absensi->status){

                                        'hadir' => 'bg-green-500/20 text-green-400',

                                        'izin' => 'bg-yellow-500/20 text-yellow-400',

                                        'sakit' => 'bg-blue-500/20 text-blue-400',

                                        default => 'bg-red-500/20 text-red-400'

                                    };

                                @endphp

                                <span class="inline-flex px-3 py-1 rounded-full text-sm {{ $warna }}">

                                    {{ ucfirst($absensi->status) }}

                                </span>

                            </td>

                            <td class="px-6 text-white">

                                {{ $absensi->keterangan ?: '-' }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="py-10 text-center text-textsecondary">

                                Belum ada data absensi.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection