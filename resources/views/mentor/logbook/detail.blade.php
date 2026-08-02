@extends('layouts.app')

@section('title', 'Logbook Mahasiswa')

@section('sidebar')
    @include('layouts.sidebar.sidebar-mentor')
@endsection

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div>

        <h1 class="text-3xl font-bold text-primary">
            Logbook Mahasiswa
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

                        <th class="px-6 text-left">
                            Kegiatan
                        </th>

                        <th class="px-6 text-center">
                            Status
                        </th>

                        <th class="px-6 text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-bordercolor">

                    @forelse($logbooks as $logbook)

                        <tr class="hover:bg-black/10 transition">

                            <td class="py-5 text-center">

                                {{ $loop->iteration }}

                            </td>

                            <td class="text-center text-white">

                                {{ \Carbon\Carbon::parse($logbook->tanggal)->format('d M Y') }}

                            </td>

                            <td class="px-6 text-white">

                                {{ \Illuminate\Support\Str::limit($logbook->kegiatan, 70) }}

                            </td>

                            <td class="text-center">

                                @php

                                    $warna = match($logbook->status){

                                        'disetujui' => 'bg-green-500/20 text-green-400',

                                        'ditolak' => 'bg-red-500/20 text-red-400',

                                        default => 'bg-yellow-500/20 text-yellow-400'

                                    };

                                @endphp

                                <span class="inline-flex px-3 py-1 rounded-full text-sm {{ $warna }}">

                                    {{ ucfirst($logbook->status) }}

                                </span>

                            </td>

                            <td class="text-center">

                                <a href="{{ route('mentor.logbook.show', $logbook->id) }}"
                                    class="bg-primary px-4 py-2 rounded-lg text-white">

                                    Detail

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="py-10 text-center text-textsecondary">

                                Belum ada logbook.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection