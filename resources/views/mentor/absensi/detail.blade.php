@extends('layouts.app')

@section('title', 'Detail Absensi')

@section('sidebar')
    @include('layouts.sidebar.sidebar-mentor')
@endsection

@section('content')

<div class="space-y-6">

    <div class="flex justify-between items-center">

        <div>

            <h1 class="text-3xl font-bold text-white">
                Riwayat Kehadiran
            </h1>

            <p class="text-textsecondary mt-2">
                Ahmad Fauzan
            </p>

        </div>

        <a href="{{ route('mentor.absensi') }}"
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
                        <th>Jam Masuk</th>
                        <th>Jam Pulang</th>
                        <th>Status</th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-border">

                    <tr>

                        <td class="py-4">24 Juli 2026</td>
                        <td>08:02</td>
                        <td>16:10</td>

                        <td>

                            <span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full">

                                Hadir

                            </span>

                        </td>

                    </tr>

                    <tr>

                        <td class="py-4">23 Juli 2026</td>
                        <td>08:10</td>
                        <td>16:00</td>

                        <td>

                            <span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full">

                                Hadir

                            </span>

                        </td>

                    </tr>

                    <tr>

                        <td class="py-4">22 Juli 2026</td>
                        <td>-</td>
                        <td>-</td>

                        <td>

                            <span class="bg-red-500/20 text-red-400 px-3 py-1 rounded-full">

                                Tidak Hadir

                            </span>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </x-ui.card>

</div>

@endsection