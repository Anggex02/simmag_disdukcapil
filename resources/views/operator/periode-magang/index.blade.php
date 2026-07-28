@extends('layouts.app')

@section('title', 'Periode Magang')

@section('sidebar')
@include('layouts.sidebar.sidebar-operator')
@endsection

@section('content')

<div class="space-y-6">

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

            <a href="{{ route('periode-magang.create') }}"
                class="bg-primary hover:opacity-90 transition px-5 py-3 rounded-xl font-semibold shadow-card">

                + Tambah Periode

            </a>

        </div>

    </div>

    @if(session('success'))

    <div class="bg-green-600 text-white px-4 py-3 rounded-xl">

        {{ session('success') }}

    </div>

    @endif

    <div class="bg-card rounded-2xl shadow-card border border-bordercolor overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-sidebar">

                    <tr>

                        <th class="text-left px-6 py-4">No</th>
                        <th class="text-left px-6 py-4">Nama Periode</th>
                        <th class="text-left px-6 py-4">Tanggal Mulai</th>
                        <th class="text-left px-6 py-4">Tanggal Selesai</th>
                        <th class="text-left px-6 py-4">Status</th>
                        <th class="text-center px-6 py-4">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($periodes as $periode)

                    <tr class="border-t border-bordercolor hover:bg-sidebar/40">

                        <td class="px-6 py-4">

                            {{ $loop->iteration }}

                        </td>

                        <td class="px-6 py-4">

                            {{ $periode->nama_periode }}

                        </td>

                        <td class="px-6 py-4">

                            {{ \Carbon\Carbon::parse($periode->tanggal_mulai)->format('d M Y') }}

                        </td>

                        <td class="px-6 py-4">

                            {{ \Carbon\Carbon::parse($periode->tanggal_selesai)->format('d M Y') }}

                        </td>

                        <td class="px-6 py-4">

                            @if($periode->status=='aktif')

                            <span class="bg-green-600 px-3 py-1 rounded-full text-sm">

                                Aktif

                            </span>

                            @else

                            <span class="bg-red-600 px-3 py-1 rounded-full text-sm">

                                Selesai

                            </span>

                            @endif

                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-center gap-2">

                                <a href="{{ route('periode-magang.edit',$periode->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-600 px-4 py-2 rounded-lg text-sm">

                                    Edit

                                </a>

                                <form action="{{ route('periode-magang.destroy',$periode->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Hapus periode ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg text-sm">

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6" class="text-center py-8 text-gray-400">

                            Belum ada data periode magang.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection