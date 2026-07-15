@extends('layouts.app')

@section('title', 'Pendaftaran Magang')

@section('sidebar')
    @include('layouts.sidebar.sidebar-mahasiswa')
@endsection

@section('content')

<div class="space-y-6">

    <div>
        <h1 class="text-3xl font-bold text-white">
            Pendaftaran Magang
        </h1>

        <p class="text-textsecondary mt-2">
            Lengkapi seluruh data untuk mendaftar program magang Disdukcapil.
        </p>
    </div>

    @if(session('success'))
        <div class="bg-green-500/20 border border-green-500 rounded-xl p-4 text-green-300">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-500/20 border border-red-500 rounded-xl p-4 text-red-300">
            {{ session('error') }}
        </div>
    @endif

    @if($pendaftaran)

        <div class="bg-card border border-bordercolor rounded-2xl p-8">

            <h2 class="text-2xl font-semibold mb-4">
                Anda Sudah Mendaftar
            </h2>

            <div class="space-y-4">

                <div>
                    <p class="text-textsecondary">Status</p>

                    <span class="px-4 py-2 rounded-xl bg-primary text-white">

                        {{ ucfirst($pendaftaran->status) }}

                    </span>
                </div>

                @if($pendaftaran->catatan_operator)

                    <div>

                        <p class="text-textsecondary">

                            Catatan Operator

                        </p>

                        <div class="mt-2 bg-background rounded-xl p-4">

                            {{ $pendaftaran->catatan_operator }}

                        </div>

                    </div>

                @endif

            </div>

        </div>

    @else

<form
action="{{ route('mahasiswa.pendaftaran.store') }}"
method="POST"
enctype="multipart/form-data"
class="bg-card border border-bordercolor rounded-2xl p-8">

@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

<div>

<label class="block mb-2">
Periode Magang
</label>

<select
name="periode_magang_id"
class="w-full rounded-xl bg-background border border-bordercolor p-3">

@if($periode)

    <option value="{{ $periode->id }}">
        {{ $periode->nama_periode }}
    </option>

@else

    <option disabled selected>
        Belum ada periode magang aktif
    </option>

@endif

</select>

</div>

<div>

<label class="block mb-2">

NIM

</label>

<input
type="text"
name="nim"
class="w-full rounded-xl bg-background border border-bordercolor p-3">

</div>

<div>

<label class="block mb-2">

Universitas

</label>

<input
type="text"
name="universitas"
class="w-full rounded-xl bg-background border border-bordercolor p-3">

</div>

<div>

<label class="block mb-2">

Program Studi

</label>

<input
type="text"
name="program_studi"
class="w-full rounded-xl bg-background border border-bordercolor p-3">

</div>

<div>

<label class="block mb-2">

Semester

</label>

<input
type="number"
name="semester"
class="w-full rounded-xl bg-background border border-bordercolor p-3">

</div>

<div>

<label class="block mb-2">

Nomor HP

</label>

<input
type="text"
name="no_hp"
class="w-full rounded-xl bg-background border border-bordercolor p-3">

</div>

<div class="md:col-span-2">

<label class="block mb-2">

Alamat

</label>

<textarea
name="alamat"
rows="3"
class="w-full rounded-xl bg-background border border-bordercolor p-3"></textarea>

</div>

<div>

<label class="block mb-2">

Upload CV (PDF)

</label>

<input
type="file"
name="cv"
accept=".pdf"
class="w-full rounded-xl bg-background border border-bordercolor p-3">

</div>

<div>

<label class="block mb-2">

Surat Pengantar (PDF)

</label>

<input
type="file"
name="surat_pengantar"
accept=".pdf"
class="w-full rounded-xl bg-background border border-bordercolor p-3">

</div>

</div>

<div class="mt-8 flex justify-end">

<button
    type="submit"
    class="bg-primary hover:opacity-90 px-5 py-3 rounded-xl text-white font-semibold">

    Kirim Pendaftaran

</button>

</div>

</form>

@endif

</div>

@endsection