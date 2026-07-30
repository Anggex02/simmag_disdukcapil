@extends('layouts.app')

@section('title', 'Detail Logbook')

@section('sidebar')
    @include('layouts.sidebar.sidebar-mentor')
@endsection

@section('content')

<div class="space-y-6">

    <div class="flex justify-between items-center">

        <div>

            <h1 class="text-3xl font-bold text-white">

                Logbook Mahasiswa

            </h1>

            <p class="text-textsecondary mt-2">

                Ahmad Fauzan

            </p>

        </div>

        <a href="{{ route('mentor.logbook') }}"
            class="bg-card px-4 py-2 rounded-lg">

            ← Kembali

        </a>

    </div>

    <x-ui.card>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="border-b border-border text-textsecondary">

                        <th class="py-3">Tanggal</th>

                        <th>Kegiatan</th>

                        <th>Status</th>

                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-border">

                    <tr>

                        <td class="py-4">

                            24 Juli 2026

                        </td>

                        <td>

                            Mempelajari Laravel Routing

                        </td>

                        <td>

                            <span class="bg-yellow-500/20 text-yellow-400 px-3 py-1 rounded-full">

                                Menunggu

                            </span>

                        </td>

                        <td>

                            <button
                                class="bg-blue-600 px-3 py-2 rounded-lg">

                                Detail

                            </button>

                        </td>

                    </tr>

                    <tr>

                        <td class="py-4">

                            23 Juli 2026

                        </td>

                        <td>

                            Mendesain Database

                        </td>

                        <td>

                            <span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full">

                                Disetujui

                            </span>

                        </td>

                        <td>

                            <button
                                class="bg-blue-600 px-3 py-2 rounded-lg">

                                Detail

                            </button>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </x-ui.card>

</div>

@endsection