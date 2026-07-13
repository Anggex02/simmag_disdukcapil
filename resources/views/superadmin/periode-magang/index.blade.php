@extends('layouts.app')

@section('title', 'Periode Magang')

@section('sidebar')
    @include('layouts.sidebar.sidebar-superadmin')
@endsection

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:justify-between md:items-center">

        <div>

            <h1 class="text-3xl font-bold text-white">
                Periode Magang
            </h1>

            <p class="text-textsecondary mt-2">
                Kelola seluruh periode magang mahasiswa.
            </p>

        </div>

        <div class="mt-4 md:mt-0">

            <button
                class="bg-primary hover:opacity-90 transition px-5 py-3 rounded-xl font-semibold shadow-card">

                + Tambah Periode

            </button>

        </div>

    </div>

    {{-- Table --}}
    <div class="bg-card rounded-2xl shadow-card border border-bordercolor overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-sidebar">

                    <tr>

                        <th class="text-left px-6 py-4">
                            No
                        </th>

                        <th class="text-left px-6 py-4">
                            Nama Periode
                        </th>

                        <th class="text-left px-6 py-4">
                            Tanggal Mulai
                        </th>

                        <th class="text-left px-6 py-4">
                            Tanggal Selesai
                        </th>

                        <th class="text-left px-6 py-4">
                            Status
                        </th>

                        <th class="text-center px-6 py-4">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <tr class="border-t border-bordercolor hover:bg-sidebar/40">

                        <td class="px-6 py-4">
                            1
                        </td>

                        <td class="px-6 py-4">
                            Magang Semester Ganjil 2026
                        </td>

                        <td class="px-6 py-4">
                            01 Juli 2026
                        </td>

                        <td class="px-6 py-4">
                            31 Desember 2026
                        </td>

                        <td class="px-6 py-4">

                            <span class="bg-green-600 px-3 py-1 rounded-full text-sm">

                                Aktif

                            </span>

                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-center gap-2">

                                <button
                                    class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg text-sm">

                                    Detail

                                </button>

                                <button
                                    class="bg-yellow-500 hover:bg-yellow-600 px-4 py-2 rounded-lg text-sm">

                                    Edit

                                </button>

                                <button
                                    class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg text-sm">

                                    Hapus

                                </button>

                            </div>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection