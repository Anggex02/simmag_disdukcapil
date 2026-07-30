@extends('layouts.app')

@section('title', 'Penilaian Mahasiswa')

@section('sidebar')
    @include('layouts.sidebar.sidebar-mentor')
@endsection

@section('content')

    <div class="space-y-6">

        <div>

            <h1 class="text-3xl font-bold text-white">

                Penilaian Mahasiswa

            </h1>

            <p class="text-textsecondary mt-2">

                Berikan nilai akhir kepada mahasiswa bimbingan.

            </p>

        </div>

        <x-ui.card>

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>

                        <tr class="border-b border-border text-textsecondary">

                            <th class="py-3">No</th>

                            <th>Nama</th>

                            <th>Universitas</th>

                            <th class="text-center">Nilai Akhir</th>

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

                                    @if($mahasiswa->penilaian)

                                        {{ number_format($mahasiswa->penilaian->nilai_akhir, 2) }}

                                    @else

                                        -

                                    @endif

                                </td>

                                <td class="text-center">

                                    <a href="{{ route('mentor.penilaian.edit', $mahasiswa->id) }}"
                                        class="bg-primary text-white px-4 py-2 rounded-lg hover:opacity-90">

                                        {{ $mahasiswa->penilaian ? 'Edit' : 'Beri Nilai' }}

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