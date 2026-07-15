@extends('layouts.app')

@section('title','Detail Pendaftaran')

@section('sidebar')
@include('layouts.sidebar.sidebar-operator')
@endsection

@section('content')

<div class="space-y-6">

<h1 class="text-3xl font-bold text-white">

Detail Pendaftaran

</h1>

<x-ui.card>

<div class="grid grid-cols-2 gap-6">

<div>

<strong>Nama</strong>

<p>{{ $pendaftaran->user->name }}</p>

</div>

<div>

<strong>Email</strong>

<p>{{ $pendaftaran->user->email }}</p>

</div>

<div>

<strong>NIM</strong>

<p>{{ $pendaftaran->nim }}</p>

</div>

<div>

<strong>Universitas</strong>

<p>{{ $pendaftaran->universitas }}</p>

</div>

<div>

<strong>Program Studi</strong>

<p>{{ $pendaftaran->program_studi }}</p>

</div>

<div>

<strong>Semester</strong>

<p>{{ $pendaftaran->semester }}</p>

</div>

<div>

<strong>No HP</strong>

<p>{{ $pendaftaran->no_hp }}</p>

</div>

<div>

<strong>Status</strong>

<p>{{ ucfirst($pendaftaran->status) }}</p>

</div>

<div class="col-span-2">

<strong>Alamat</strong>

<p>{{ $pendaftaran->alamat }}</p>

</div>

<div>

<strong>CV</strong>

<br>

<a
href="{{ asset('storage/'.$pendaftaran->cv) }}"
target="_blank"
class="text-primary">

Lihat CV

</a>

</div>

<div>

<strong>Surat Pengantar</strong>

<br>

<a
href="{{ asset('storage/'.$pendaftaran->surat_pengantar) }}"
target="_blank"
class="text-primary">

Lihat Surat

</a>

</div>

</div>

@if($pendaftaran->status == 'menunggu')

<div class="flex gap-4 mt-8">

<form action="{{ route('operator.validasi.terima', $pendaftaran->id) }}" method="POST">

    @csrf
    @method('PUT')

  <x-ui.button type="submit">

Terima

</x-ui.button>

</form>

<form action="{{ route('operator.validasi.tolak',$pendaftaran->id) }}"
method="POST">

@csrf
@method('PUT')

<button
class="px-5 py-3 rounded-xl bg-red-500 text-white">

Tolak

</button>

</form>

</div>

@endif

</x-ui.card>

@endsection