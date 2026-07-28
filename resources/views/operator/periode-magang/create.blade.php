@extends('layouts.app')

@section('title','Tambah Periode Magang')

@section('sidebar')
@include('layouts.sidebar.sidebar-operator')
@endsection

@section('content')

<div class="max-w-3xl mx-auto">

    <h1 class="text-3xl font-bold mb-8">

        Tambah Periode Magang

    </h1>

    <form action="{{ route('periode-magang.store') }}" method="POST">

        @csrf

        <div class="space-y-5">

            <div>

                <label>Nama Periode</label>

                <input
                    type="text"
                    name="nama_periode"
                    class="w-full rounded-xl border border-bordercolor bg-background p-3"
                    required>

            </div>

            <div>

                <label>Tanggal Mulai</label>

                <input
                    type="date"
                    name="tanggal_mulai"
                    class="w-full rounded-xl border border-bordercolor bg-background p-3"
                    required>

            </div>

            <div>

                <label>Tanggal Selesai</label>

                <input
                    type="date"
                    name="tanggal_selesai"
                    class="w-full rounded-xl border border-bordercolor bg-background p-3"
                    required>

            </div>

            <div>

                <label>Status</label>

                <select
                    name="status"
                    class="w-full rounded-xl border border-bordercolor bg-background p-3">

                    <option value="aktif">

                        Aktif

                    </option>

                    <option value="selesai">

                        Selesai

                    </option>

                </select>

            </div>

            <div class="flex justify-end gap-3">

                <a
                    href="{{ route('periode-magang.index') }}"
                    class="px-5 py-3 rounded-xl bg-gray-600">

                    Batal

                </a>

                <button
                    class="px-5 py-3 rounded-xl bg-primary text-white">

                    Simpan

                </button>

            </div>

        </div>

    </form>

</div>

@endsection