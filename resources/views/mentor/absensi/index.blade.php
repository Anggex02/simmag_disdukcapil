@extends('layouts.app')

@section('title', 'Absensi Mahasiswa')

@section('sidebar')
    @include('layouts.sidebar.sidebar-mentor')
@endsection

@section('content')

    <div class="space-y-6">

        {{-- Header --}}
        <div>

            <h1 class="text-3xl font-bold text-primary">
                Absensi Mahasiswa
            </h1>

            <p class="mt-2 text-primary">
                Daftar absensi mahasiswa bimbingan.
            </p>

        </div>

        {{-- Search --}}
        <div class="bg-card border border-bordercolor rounded-2xl p-6">

            <input type="text" placeholder="Cari mahasiswa..."
                class="w-full rounded-xl bg-background border border-bordercolor px-4 py-3 text-gray-800 placeholder:text-gray-500 focus:ring-2 focus:ring-primary focus:border-primary">

        </div>

        {{-- Table --}}
        <div class="bg-card border border-bordercolor rounded-2xl overflow-hidden shadow-card">

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>
                        <tr class="border-b border-bordercolor text-textsecondary">

                            <th class="px-6 py-4 text-center w-16">No</th>

                            <th class="px-6 py-4 text-left">
                                Nama Mahasiswa
                            </th>

                            <th class="px-6 py-4 text-center">
                                NIM
                            </th>

                            <th class="px-6 py-4 text-left">
                                Universitas
                            </th>

                            <th class="px-6 py-4 text-center">
                                Total Absensi
                            </th>

                            <th class="px-6 py-4 text-center">
                                Aksi
                            </th>

                        </tr>
                    </thead>

                    <tbody class="divide-y divide-bordercolor">

                        @forelse($mahasiswas as $mahasiswa)

                            <tr class="hover:bg-black/10 transition">

                                <td class="px-6 py-5 text-center">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-6 py-5 font-medium text-white">
                                    {{ $mahasiswa->user->name }}
                                </td>

                                <td class="px-6 py-5 text-center text-white">
                                    {{ $mahasiswa->nim }}
                                </td>

                                <td class="px-6 py-5 text-white">
                                    {{ $mahasiswa->universitas }}
                                </td>

                                <td class="px-6 py-5 text-center">

                                    <span
                                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-primary/20 text-primary font-semibold">

                                        {{ $mahasiswa->absensis_count }}

                                    </span>

                                </td>

                                <td class="px-6 py-5 text-center">

                                    <a href="{{ route('mentor.absensi.detail', $mahasiswa->id) }}"
                                        class="bg-primary hover:bg-primary-hover text-white px-5 py-2 rounded-lg transition">

                                        Detail

                                    </a>

                                </td>

                            </tr>
                        @empty

                            <tr>

                                <td colspan="6" class="py-10 text-center text-textsecondary">

                                    Belum ada mahasiswa.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection