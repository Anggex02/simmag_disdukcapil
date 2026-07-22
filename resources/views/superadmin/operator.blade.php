@extends('layouts.app')

@section('title', 'Data Operator')

@section('sidebar')
    @include('layouts.sidebar.sidebar-superadmin')
@endsection

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">

        <div>

            <h1 class="text-3xl font-bold text-white">
                Data Operator
            </h1>

            <p class="text-textsecondary mt-2">
                Kelola seluruh akun operator.
            </p>

        </div>

        <div>

           <a href="{{ route('operator.create') }}">
    <x-ui.button>
        + Tambah Operator
    </x-ui.button>
</a>
        </div>

    </div>

    {{-- Search --}}
   <form method="GET" action="{{ route('operator.index') }}" class="flex gap-4">

    <input
        type="text"
        name="search"
        value="{{ request('search') }}"
        placeholder="Cari Operator..."
        class="flex-1 rounded-xl bg-background border border-bordercolor px-4 py-3 text-white placeholder:text-gray-500">

    <x-ui.button type="submit">
        Cari
    </x-ui.button>

</form>

    {{-- Table --}}
    <x-table.table>

        <x-table.thead>

            <tr>

                <x-table.th>No</x-table.th>

                <x-table.th>Nama</x-table.th>

                <x-table.th>Email</x-table.th>

                <x-table.th>No HP</x-table.th>

                <x-table.th>Status</x-table.th>

                <x-table.th class="text-center">

                    Aksi

                </x-table.th>

            </tr>

        </x-table.thead>

        <x-table.tbody>

            @forelse($operators as $operator)

<tr>

    <x-table.td>
        {{ $loop->iteration }}
    </x-table.td>

    <x-table.td>
        {{ $operator->user->name }}
    </x-table.td>

    <x-table.td>
        {{ $operator->user->email }}
    </x-table.td>

    <x-table.td>
        {{ $operator->user->no_hp }}
    </x-table.td>

    <x-table.td>
        {{ $operator->nip }}

    </x-table.td>
    {{ $operator->jabatan }}
    <x-table.td>

        <x-ui.badge>

            {{ $operator->is_active ? 'Aktif' : 'Nonaktif' }}

        </x-ui.badge>

    </x-table.td>

    <x-table.td>

    <div class="flex justify-center gap-2">

        <a href="{{ route('operator.edit', $operator->id) }}">

            <x-ui.button color="warning">

                Edit

            </x-ui.button>

        </a>

        <form
action="{{ route('operator.destroy',$operator->id) }}"
method="POST">

@csrf
@method('DELETE')

<x-ui.button
type="submit"
color="danger">

Hapus

</x-ui.button>

</form>

    </div>

</x-table.td>

</tr>

@empty

<tr>

    <td colspan="6" class="text-center py-8">

        Belum ada data operator.

    </td>

</tr>

@endforelse

        </x-table.tbody>

    </x-table.table>

</div>

@endsection