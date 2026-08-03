@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('sidebar')
    @include('layouts.sidebar.sidebar-operator')
@endsection

@section('content')

    <div class="space-y-6">

        <div class="flex justify-between items-center">

            <div>

                <h1 class="text-3xl font-bold text-primary">

                    Data Mahasiswa

                </h1>

                <p class="text-primary">

                    Daftar mahasiswa yang telah mendaftar magang.

                </p>

            </div>

            <a href="{{ route('mahasiswa.create') }}">

                <x-ui.button>

                    + Tambah Mahasiswa

                </x-ui.button>

            </a>

        </div>
        @if(session('success'))

            <div class="bg-green-500/20 border border-green-500 rounded-xl p-4 text-green-300">

                {{ session('success') }}

            </div>

        @endif

        <form method="GET" action="{{ route('mahasiswa.index') }}">

            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Cari Nama / Email / NIM / Universitas"
                class="w-full rounded-xl bg-background border border-bordercolor p-3 text-primary">

        </form>

        <x-table.table>

            <x-table.thead>

                <tr>

                    <x-table.th>No</x-table.th>

                    <x-table.th>Nama</x-table.th>

                    <x-table.th>NIM</x-table.th>

                    <x-table.th>Universitas</x-table.th>

                    <x-table.th>Program Studi</x-table.th>

                    <x-table.th>Status</x-table.th>

                    <x-table.th>Mentor</x-table.th>

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

                            {{ $mhs->jurusan }}

                        </x-table.td>

                        <x-table.td>

                            <x-ui.badge>

                                {{ ucfirst($mhs->status) }}

                            </x-ui.badge>

                        </x-table.td>

                        <x-table.td class="text-center">

                            @if($mhs->mentor)

                                <span class="text-green-400 font-medium">
                                    {{ $mhs->mentor->nama }}
                                </span>

                            @else

                                <span class="text-red-400">
                                    Belum Ada
                                </span>

                            @endif


                        </x-table.td>

                        <x-table.td>

                            <div class="flex items-center justify-center gap-2">

                                {{-- Assign / Ubah Mentor --}}
                                <a href="{{ route('mahasiswa.mentor', $mhs->id) }}"
                                    class="bg-blue-600 hover:bg-blue-700 w-28 text-center text-white py-2 rounded-lg text-sm font-medium transition">

                                    {{ $mhs->mentor ? 'Ubah Mentor' : 'Mentor' }}

                                </a>

                                {{-- Edit --}}
                                <a href="{{ route('mahasiswa.edit', $mhs->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-600 w-20 text-center text-white py-2 rounded-lg text-sm font-medium transition">

                                    Edit

                                </a>

                                {{-- Hapus --}}
                                <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data mahasiswa ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 w-20 py-2 rounded-lg text-white text-sm font-medium transition">

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