@extends('layouts.app')

@section('title','Validasi Berkas')

@section('sidebar')
    @include('layouts.sidebar.sidebar-operator')
@endsection

@section('content')

<div class="space-y-6">

    <div class="flex justify-between items-center">

        <div>

            <h1 class="text-3xl font-bold text-white">

                Validasi Berkas

            </h1>

            <p class="text-textsecondary mt-2">

                Kelola seluruh pendaftaran mahasiswa.

            </p>

        </div>

    </div>

    @if(session('success'))

    <div class="bg-green-500/20 border border-green-500 rounded-xl p-4 text-green-300">

        {{ session('success') }}

    </div>

    @endif

    <form method="GET" action="{{ route('operator.validasi') }}">

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

                <x-table.th>Status</x-table.th>

                <x-table.th>Aksi</x-table.th>

            </tr>

        </x-table.thead>

        <x-table.tbody>

            @forelse($pendaftaran as $item)

            <tr>

                <x-table.td>{{ $loop->iteration }}</x-table.td>

                <x-table.td>{{ $item->user->name }}</x-table.td>

                <x-table.td>{{ $item->nim }}</x-table.td>

                <x-table.td>{{ $item->universitas }}</x-table.td>

                <x-table.td>

                    <x-ui.badge>

                        {{ ucfirst($item->status) }}

                    </x-ui.badge>

                </x-table.td>

               <x-table.td>

<div class="flex gap-2">

    <a href="{{ route('operator.validasi.show',$item->id) }}">

        <x-ui.button>
            Detail
        </x-ui.button>

    </a>

    @if($item->status == 'menunggu')

    <form action="{{ route('operator.validasi.terima',$item->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <button
            class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-lg">

            Terima

        </button>

    </form>

    <form action="{{ route('operator.validasi.tolak',$item->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <button
            class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg">

            Tolak

        </button>

    </form>

    @endif

</div>

</x-table.td>

            </tr>

            @empty

            <tr>

                <td colspan="6" class="text-center py-8">

                    Belum ada pendaftaran.

                </td>

            </tr>

            @endforelse

        </x-table.tbody>

    </x-table.table>

</div>

@endsection