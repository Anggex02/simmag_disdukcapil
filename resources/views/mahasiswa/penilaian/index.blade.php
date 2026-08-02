@extends('layouts.app')

@section('title','Nilai Magang')

@section('sidebar')
@include('layouts.sidebar.sidebar-mahasiswa')
@endsection

@section('content')

<div class="space-y-6">

    <div>

        <h1 class="text-3xl font-bold text-primary">
            Nilai Magang
        </h1>

        <p class="text-primary mt-2">
            Hasil penilaian dari mentor.
        </p>

    </div>

    <div class="bg-card border border-bordercolor rounded-2xl p-6">

        @if($mahasiswa && $mahasiswa->penilaian)

            <div class="grid md:grid-cols-2 gap-6">

                <div>

                    <p class="text-textsecondary">
                        Nilai Akhir
                    </p>

                    <h2 class="text-5xl font-bold text-primary mt-2">

                        {{ $mahasiswa->penilaian->nilai_akhir }}

                    </h2>

                </div>

                <div>

                    <p class="text-textsecondary">
                        Mentor
                    </p>

                    <h2 class="text-2xl font-semibold text-white mt-3">

                        {{ $mahasiswa->mentor->user->name ?? '-' }}

                    </h2>

                </div>

                <div class="md:col-span-2">

                    <p class="text-textsecondary">
                        Catatan Mentor
                    </p>

                    <div class="mt-3">

                        {{ $mahasiswa->penilaian->catatan ?? '-' }}

                    </div>

                </div>

            </div>

            <div class="mt-8">

                <a href="{{ route('mahasiswa.penilaian.cetak') }}"
                    class="bg-primary px-6 py-3 rounded-xl text-white">

                    Cetak Nilai

                </a>

            </div>

        @else

            <div class="text-center py-12 text-textsecondary">

                Mentor belum memberikan penilaian.

            </div>

        @endif

    </div>

</div>

@endsection