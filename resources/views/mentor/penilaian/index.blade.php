@extends('layouts.app')

@section('title', 'Penilaian Mahasiswa')

@section('sidebar')
    @include('layouts.sidebar.sidebar-mentor')
@endsection

@section('content')

    <div class="space-y-6">

        <div>

            <h1 class="text-3xl font-bold text-primary">

                Penilaian Mahasiswa

            </h1>

            <p class="text-primary mt-2">

                Berikan nilai akhir kepada mahasiswa bimbingan.

            </p>

        </div>

        <x-ui.card>

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>
                        <tr class="border-b border-bordercolor text-textsecondary">

                            <th class="w-16 py-4 text-center">No</th>

                            <th class="w-72 py-4 text-left">Nama</th>

                            <th class="py-4 text-left">Universitas</th>

                            <th class="w-40 py-4 text-center">Nilai Akhir</th>

                            <th class="w-40 py-4 text-center">Aksi</th>

                        </tr>
                    </thead>
                    <tbody class="divide-y divide-bordercolor">

                        @forelse($mahasiswas as $mahasiswa)

                            <tr class="border-b border-bordercolor hover:bg-black/10 transition">

                                <td class="py-5 text-center align-middle">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-6 py-5 align-middle font-medium text-white">
                                    {{ $mahasiswa->user->name }}
                                </td>

                                <td class="px-6 py-5 align-middle text-white">
                                    {{ $mahasiswa->universitas }}
                                </td>

                                <td class="py-5 text-center align-middle text-white">
                                    {{ $mahasiswa->penilaian->nilai_akhir ?? '-' }}
                                </td>

                                <td class="py-5 text-center align-middle">

                                    <a href="{{ route('mentor.penilaian.edit', $mahasiswa->id) }}"
                                        class="bg-primary hover:bg-primary-hover text-white px-5 py-2 rounded-lg transition inline-block">

                                        Beri Nilai

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