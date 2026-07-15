@extends('layouts.app')

@section('title','Data Mahasiswa')

@section('sidebar')
@include('layouts.sidebar.sidebar-operator')
@endsection

@section('content')

<div class="flex justify-between items-center">

    <div>

        <h1 class="text-3xl font-bold text-white">
            Data Mahasiswa
        </h1>

        <p class="text-textsecondary">
            Daftar mahasiswa yang telah mendaftar magang.
        </p>

    </div>

    <a href="{{ route('mahasiswa.create') }}">

        <x-ui.button>
            + Tambah Mahasiswa
        </x-ui.button>

    </a>

</div>

    <form method="GET" action="{{ route('mahasiswa.index') }}">

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari Nama / Email / NIM / Universitas"
            class="w-full rounded-xl bg-background border border-bordercolor p-3 text-white">

    </form>

    

  <x-table.table>

    <x-table.thead>

        <tr>

            <x-table.th>No</x-table.th>
            <x-table.th>Nama</x-table.th>
            <x-table.th>NIM</x-table.th>
            <x-table.th>Universitas</x-table.th>
            <x-table.th>Program Studi</x-table.th>
            <x-table.th>Semester</x-table.th>
            <x-table.th>Status</x-table.th>
            <x-table.th>Aksi</x-table.th>

        </tr>

    </x-table.thead>

    <x-table.tbody>

        @forelse($mahasiswas as $mhs)

        <tr>

            <x-table.td>
                {{ $loop->iteration }}
            </x-table.td>

            <x-table.td>
                {{ $mhs->user->name }}
            </x-table.td>

            <x-table.td>
                {{ $mhs->nim }}
            </x-table.td>

            <x-table.td>
                {{ $mhs->universitas }}
            </x-table.td>

            <x-table.td>
                {{ $mhs->program_studi }}
            </x-table.td>

            <x-table.td>
                {{ $mhs->semester }}
            </x-table.td>

            <x-table.td>

                <x-ui.badge>
                    {{ ucfirst($mhs->status) }}
                </x-ui.badge>

            </x-table.td>

            <x-table.td>

                <div class="flex gap-2">

                    <a
                        href="{{ route('mahasiswa.edit', $mhs->id) }}"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-lg">

                        Edit

                    </a>

                    <form
                        action="{{ route('mahasiswa.destroy', $mhs->id) }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus data mahasiswa ini?')">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg">

                            Hapus

                        </button>

                    </form>

                </div>

            </x-table.td>

        </tr>

        @empty

        <tr>

            <td colspan="8" class="text-center py-8">

                Belum ada mahasiswa yang mendaftar.

            </td>

        </tr>

        @endforelse

    </x-table.tbody>

</x-table.table>
</div>

@endsection