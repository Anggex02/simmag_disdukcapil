@extends('layouts.app')

@section('title', 'Detail Logbook')

@section('sidebar')
    @include('layouts.sidebar.sidebar-mentor')
@endsection

@section('content')

<div class="space-y-6">

    <div>

        <h1 class="text-3xl font-bold text-white">

            Logbook Mahasiswa

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

                        <th class="py-3">No</th>

                        <th>Tanggal</th>

                        <th>Kegiatan</th>

                        <th>Status</th>

                        <th class="text-center">

                            Aksi

                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-border">

                    @forelse($logbooks as $logbook)

                        <tr>

                            <td class="py-4">

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                {{ \Carbon\Carbon::parse($logbook->tanggal)->format('d M Y') }}

                            </td>

                            <td>

                                {{ \Illuminate\Support\Str::limit($logbook->kegiatan,50) }}

                            </td>

                            <td>

                                @php

                                    $warna = match($logbook->status){

                                        'disetujui' => 'bg-green-500/20 text-green-400',

                                        'ditolak' => 'bg-red-500/20 text-red-400',

                                        default => 'bg-yellow-500/20 text-yellow-400'

                                    };

                                @endphp

                                <span class="px-3 py-1 rounded-full text-sm {{ $warna }}">

                                    {{ ucfirst($logbook->status) }}

                                </span>

                            </td>

                            <td class="text-center">

                                <a
                                    href="{{ route('mentor.logbook.show',$logbook->id) }}"
                                    class="bg-primary px-4 py-2 rounded-lg text-white">

                                    Detail

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center py-8 text-textsecondary">

                                Belum ada logbook.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </x-ui.card>

</div>

@endsection