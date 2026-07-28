@extends('layouts.app')

@section('title','Edit Periode Magang')

@section('sidebar')
@include('layouts.sidebar.sidebar-operator')
@endsection

@section('content')

<div class="max-w-3xl mx-auto">

    <h1 class="text-3xl font-bold mb-8">

        Edit Periode Magang

    </h1>

    <form action="{{ route('periode-magang.update',$periode->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="space-y-5">

            <div>

                <label>Nama Periode</label>

                <input
                    type="text"
                    name="nama_periode"
                    value="{{ old('nama_periode',$periode->nama_periode) }}"
                    class="w-full rounded-xl border border-bordercolor bg-background p-3">

            </div>

            <div>

                <label>Tanggal Mulai</label>

                <input
                    type="date"
                    name="tanggal_mulai"
                    value="{{ old('tanggal_mulai',$periode->tanggal_mulai) }}"
                    class="w-full rounded-xl border border-bordercolor bg-background p-3">

            </div>

            <div>

                <label>Tanggal Selesai</label>

                <input
                    type="date"
                    name="tanggal_selesai"
                    value="{{ old('tanggal_selesai',$periode->tanggal_selesai) }}"
                    class="w-full rounded-xl border border-bordercolor bg-background p-3">

            </div>

            <div>

                <label>Status</label>

                <select
                    name="status"
                    class="w-full rounded-xl border border-bordercolor bg-background p-3">

                    <option value="aktif"
                        {{ $periode->status=='aktif' ? 'selected' : '' }}>

                        Aktif

                    </option>

                    <option value="selesai"
                        {{ $periode->status=='selesai' ? 'selected' : '' }}>

                        Selesai

                    </option>

                </select>

            </div>

            <div class="flex justify-end gap-3">

                <a
                    href="{{ route('periode-magang.index') }}"
                    class="px-5 py-3 rounded-xl bg-gray-600 text-white">

                    Batal

                </a>

                <button
                    type="submit"
                    class="px-5 py-3 rounded-xl bg-primary text-white">

                    Simpan Perubahan

                </button>

            </div>

        </div>

    </form>

</div>

@endsection