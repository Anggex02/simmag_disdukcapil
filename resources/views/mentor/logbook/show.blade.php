@extends('layouts.app')

@section('title', 'Detail Logbook')

@section('sidebar')
    @include('layouts.sidebar.sidebar-mentor')
@endsection

@section('content')

    <div class="space-y-6">

        <div>

            <h1 class="text-3xl font-bold text-primary">

                Detail Logbook

            </h1>

            <p class="text-primary mt-2">

                {{ $logbook->mahasiswa->user->name }}

            </p>

        </div>

       <x-ui.card>

    {{-- Informasi --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div>

            <p class="text-textsecondary text-sm">
                Tanggal
            </p>

            <p class="mt-2 text-lg font-medium">
                {{ \Carbon\Carbon::parse($logbook->tanggal)->format('d F Y') }}
            </p>

        </div>

        <div>

            <p class="text-textsecondary text-sm">
                Status
            </p>

            <div class="mt-2">

                @php
                    $warna = match ($logbook->status) {
                        'disetujui' => 'bg-green-500/20 text-green-400',
                        'revisi' => 'bg-yellow-500/20 text-yellow-400',
                        default => 'bg-blue-500/20 text-blue-400'
                    };
                @endphp

                <span class="px-3 py-1 rounded-full text-sm {{ $warna }}">
                    {{ ucfirst($logbook->status) }}
                </span>

            </div>

        </div>

    </div>

    <hr class="my-6 border-bordercolor">

    {{-- Isi --}}
    <div class="space-y-5">

        <div>

            <p class="text-textsecondary text-sm mb-2">
                Kegiatan
            </p>

            <div class="rounded-lg border border-bordercolor p-4 whitespace-pre-line">
                {{ $logbook->kegiatan }}
            </div>

        </div>

        <div>

            <p class="text-textsecondary text-sm mb-2">
                Kendala
            </p>

            <div class="rounded-lg border border-bordercolor p-4 whitespace-pre-line">
                {{ $logbook->kendala ?: '-' }}
            </div>

        </div>

        <div>

            <p class="text-textsecondary text-sm mb-2">
                Hasil Pekerjaan
            </p>

            <div class="rounded-lg border border-bordercolor p-4 whitespace-pre-line">
                {{ $logbook->hasil_pekerjaan ?: '-' }}
            </div>

        </div>

        <div>

            <p class="text-textsecondary text-sm mb-2">
                Bukti Kegiatan
            </p>

            @if($logbook->bukti_kegiatan)

                <a href="{{ asset('storage/' . $logbook->bukti_kegiatan) }}"
                    target="_blank"
                    class="inline-flex bg-primary text-white px-4 py-2 rounded-lg">

                    Lihat File

                </a>

            @else

                <p>-</p>

            @endif

        </div>

    </div>

</x-ui.card>
        <x-ui.card>

            <form action="{{ route('mentor.logbook.update', $logbook->id) }}" method="POST">

                @csrf

                @method('PUT')

                <div>

                    <label class="text-textsecondary">

                        Komentar Mentor

                    </label>

                    <textarea name="komentar_mentor" rows="5"
                        class="w-full mt-3 rounded-lg bg-background border border-border text-primary p-4">{{ old('komentar_mentor', $logbook->komentar_mentor) }}</textarea>

                </div>

                <div class="mt-6 flex gap-3">

                    <button type="submit" name="status" value="disetujui"
                        class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg">

                        ✓ Setujui

                    </button>

                    <button type="submit" name="status" value="revisi"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded-lg">

                        ✎ Minta Revisi

                    </button>

                </div>

            </form>

        </x-ui.card>

    </div>

@endsection