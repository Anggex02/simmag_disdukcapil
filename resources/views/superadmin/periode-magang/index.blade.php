@extends('layouts.app')

@section('title', 'Periode Magang')

@section('content')

<div class="flex justify-between items-center mb-6">

    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Periode Magang
        </h1>

        <p class="text-gray-500 mt-1">
            Kelola periode magang mahasiswa.
        </p>
    </div>

    <a href="{{ route('periode-magang.create') }}"
        class="bg-cyan-500 hover:bg-cyan-600 text-white px-5 py-2 rounded-xl shadow">

        + Tambah Periode

    </a>

</div>

<div class="bg-white rounded-2xl shadow overflow-hidden">

    <table class="min-w-full">

        <thead class="bg-gray-100">

            <tr>

                <th class="px-6 py-4 text-left">No</th>

                <th class="px-6 py-4 text-left">Nama Periode</th>

                <th class="px-6 py-4 text-left">Tanggal Mulai</th>

                <th class="px-6 py-4 text-left">Tanggal Selesai</th>

                <th class="px-6 py-4 text-left">Status</th>

                <th class="px-6 py-4 text-center">Aksi</th>

            </tr>

        </thead>

        <tbody>

            @forelse ($periode as $item)

            <tr class="border-b">

                <td class="px-6 py-4">
                    {{ $loop->iteration }}
                </td>

                <td class="px-6 py-4">
                    {{ $item->nama_periode }}
                </td>

                <td class="px-6 py-4">
                    {{ $item->tanggal_mulai }}
                </td>

                <td class="px-6 py-4">
                    {{ $item->tanggal_selesai }}
                </td>

                <td class="px-6 py-4">

                    @if($item->status == 'aktif')

                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                            Aktif
                        </span>

                    @else

                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">
                            Selesai
                        </span>

                    @endif

                </td>

                <td class="px-6 py-4 text-center space-x-2">

                    <a href="{{ route('periode-magang.edit', $item->id) }}"
                        class="bg-yellow-400 text-white px-3 py-2 rounded-lg">

                        Edit

                    </a>

                    <form action="{{ route('periode-magang.destroy', $item->id) }}"
                        method="POST"
                        class="inline">

                        @csrf
                        @method('DELETE')

                        <button
                            onclick="return confirm('Hapus periode ini?')"
                            class="bg-red-500 text-white px-3 py-2 rounded-lg">

                            Hapus

                        </button>

                    </form>

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

@endsection