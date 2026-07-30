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

                            <td class="text-center">

                                {{ $mahasiswa->logbooks_count }}

                            </td>

                            <td class="text-center">

                                <a
                                    href="{{ route('mentor.logbook.detail',$mahasiswa->id) }}"
                                    class="bg-primary hover:opacity-90 text-white px-4 py-2 rounded-lg">

                                    Lihat

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="py-8 text-center text-textsecondary">

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