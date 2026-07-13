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

            <x-ui.button>

                + Tambah Operator

            </x-ui.button>

        </div>

    </div>

    {{-- Search --}}
    <x-ui.card>

        <div class="flex flex-col md:flex-row gap-4">

            <input
                type="text"
                placeholder="Cari Operator..."
                class="flex-1 rounded-xl bg-background border border-bordercolor px-4 py-3">

            <x-ui.button>

                Cari

            </x-ui.button>

        </div>

    </x-ui.card>

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

            <tr>

                <x-table.td>1</x-table.td>

                <x-table.td>

                    Wildan Zahid

                </x-table.td>

                <x-table.td>

                    admin@gmail.com

                </x-table.td>

                <x-table.td>

                    08123456789

                </x-table.td>

                <x-table.td>

                    <x-ui.badge>

                        Aktif

                    </x-ui.badge>

                </x-table.td>

                <x-table.td>

                    <div class="flex justify-center gap-2">

                        <x-ui.button color="warning">

                            Edit

                        </x-ui.button>

                        <x-ui.button color="danger">

                            Hapus

                        </x-ui.button>

                    </div>

                </x-table.td>

            </tr>

        </x-table.tbody>

    </x-table.table>

</div>

@endsection