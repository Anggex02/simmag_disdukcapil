@extends('layouts.app')

@section('title', 'Logbook Mahasiswa')

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
            Pilih mahasiswa untuk melihat logbook harian.
        </p>

    </div>

    <x-ui.card>

        <div class="grid md:grid-cols-2 gap-4">

            <input
                type="text"
                placeholder="Cari mahasiswa..."
                class="w-full bg-background border border-border rounded-lg px-4 py-3 text-white">

            <select
                class="w-full bg-background border border-border rounded-lg px-4 py-3 text-white">

                <option>Semua Status</option>
                <option>Aktif</option>
                <option>Selesai</option>

            </select>

        </div>

    </x-ui.card>

    <x-ui.card>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="border-b border-border text-textsecondary">

                        <th class="py-3 text-left">No</th>

                        <th class="text-left">Mahasiswa</th>

                        <th class="text-left">Universitas</th>

                        <th class="text-center">Jumlah Logbook</th>

                        <th class="text-center">Belum Dicek</th>

                        <th class="text-center">Aksi</th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-border">

                    <tr>

                        <td class="py-4">1</td>

                        <td>Ahmad Fauzan</td>

                        <td>Universitas Negeri Makassar</td>

                        <td class="text-center">28</td>

                        <td class="text-center">

                            <span class="bg-yellow-500/20 text-yellow-400 px-3 py-1 rounded-full">

                                3

                            </span>

                        </td>

                        <td class="text-center">

                            <a href="{{ route('mentor.logbook.detail') }}"
                                class="bg-primary px-4 py-2 rounded-lg">

                                Lihat

                            </a>

                        </td>

                    </tr>

                    <tr>

                        <td class="py-4">2</td>

                        <td>Nabila Putri</td>

                        <td>Universitas Hasanuddin</td>

                        <td class="text-center">30</td>

                        <td class="text-center">

                            <span class="bg-green-500/20 text-green-400 px-3 py-1 rounded-full">

                                0

                            </span>

                        </td>

                        <td class="text-center">

                            <a href="{{ route('mentor.logbook.detail') }}"
                                class="bg-primary px-4 py-2 rounded-lg">

                                Lihat

                            </a>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </x-ui.card>

</div>

@endsection