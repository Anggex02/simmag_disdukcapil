@extends('layouts.app')

@section('title','Detail Logbook')

@section('sidebar')
@include('layouts.sidebar.sidebar-mentor')
@endsection

@section('content')

<div class="space-y-6">

<h1 class="text-3xl font-bold text-white">

Detail Logbook

</h1>

<x-ui.card>

<div class="space-y-4">

<div>

<b>Tanggal</b>

<p>{{ $logbook->tanggal }}</p>

</div>

<div>

<b>Kegiatan</b>

<p>{{ $logbook->kegiatan }}</p>

</div>

<div>

<b>Kendala</b>

<p>{{ $logbook->kendala }}</p>

</div>

<div>

<b>Hasil Pekerjaan</b>

<p>{{ $logbook->hasil_pekerjaan }}</p>

</div>

<div>

<b>Status</b>

<p>{{ ucfirst($logbook->status) }}</p>

</div>

<div>

<b>Komentar Mentor</b>

<p>

{{ $logbook->komentar_mentor ?? '-' }}

</p>

</div>

@if($logbook->bukti_kegiatan)

<div>

<b>Bukti Kegiatan</b>

<img
src="{{ asset('storage/'.$logbook->bukti_kegiatan) }}"
class="rounded-lg mt-2 w-96">

</div>

@endif

</div>

</x-ui.card>

</div>

@endsection