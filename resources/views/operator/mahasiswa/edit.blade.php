@extends('layouts.app')

@section('title','Edit Mahasiswa')

@section('sidebar')
@include('layouts.sidebar.sidebar-operator')
@endsection

@section('content')

<div class="max-w-5xl mx-auto">

<form action="{{ route('mahasiswa.update',$mahasiswa->id) }}" method="POST">

@csrf
@method('PUT')

<div class="bg-card rounded-2xl p-8 border border-bordercolor space-y-8">

<h2 class="text-2xl font-bold">
Data Mahasiswa
</h2>

<div class="grid grid-cols-2 gap-6">

<div>
<label>Nama</label>
<input
type="text"
name="name"
value="{{ old('name',$mahasiswa->user->name) }}"
class="w-full rounded-xl border border-bordercolor bg-background p-3">
</div>

<div>
<label>Email</label>
<input
type="email"
name="email"
value="{{ old('email',$mahasiswa->user->email) }}"
class="w-full rounded-xl border border-bordercolor bg-background p-3">
</div>

<div>
<label>NIM</label>
<input
type="text"
name="nim"
value="{{ old('nim',$mahasiswa->nim) }}"
class="w-full rounded-xl border border-bordercolor bg-background p-3">
</div>

<div>
<label>Universitas</label>
<input
type="text"
name="universitas"
value="{{ old('universitas',$mahasiswa->universitas) }}"
class="w-full rounded-xl border border-bordercolor bg-background p-3">
</div>

<div>
<label>Program Studi</label>
<input
type="text"
name="program_studi"
value="{{ old('program_studi',$mahasiswa->program_studi) }}"
class="w-full rounded-xl border border-bordercolor bg-background p-3">
</div>

<div>
<label>Semester</label>
<input
type="number"
name="semester"
value="{{ old('semester',$mahasiswa->semester) }}"
class="w-full rounded-xl border border-bordercolor bg-background p-3">
</div>

<div>
<label>No HP</label>
<input
type="text"
name="no_hp"
value="{{ old('no_hp',$mahasiswa->no_hp) }}"
class="w-full rounded-xl border border-bordercolor bg-background p-3">
</div>

<div class="col-span-2">
<label>Alamat</label>
<textarea
name="alamat"
rows="3"
class="w-full rounded-xl border border-bordercolor bg-background p-3">{{ old('alamat',$mahasiswa->alamat) }}</textarea>
</div>

</div>

<hr class="border-bordercolor">

<h2 class="text-2xl font-bold">
Penempatan Magang
</h2>

@if($mahasiswa->status != 'diterima')

<div class="bg-yellow-500/20 border border-yellow-500 rounded-xl p-4 text-yellow-300 mb-6">

Mahasiswa belum diterima. Penempatan mentor hanya bisa dilakukan setelah status pendaftaran diterima.

</div>

@endif

<div class="grid grid-cols-2 gap-6">

<div>

<label>Mentor</label>

<select
name="mentor_id"
class="w-full rounded-xl border border-bordercolor bg-background p-3"
{{ $mahasiswa->status != 'diterima' ? 'disabled' : '' }}>

<option value="">-- Pilih Mentor --</option>

@foreach($mentors as $mentor)

<option
value="{{ $mentor->id }}"
{{ $mahasiswa->mentor_id == $mentor->id ? 'selected' : '' }}>

{{ $mentor->nama }}

</option>

@endforeach

</select>

</div>

<div>

<label>Divisi</label>

<input
type="text"
name="divisi"
value="{{ old('divisi',$mahasiswa->divisi) }}"
class="w-full rounded-xl border border-bordercolor bg-background p-3">
{{ $mahasiswa->status != 'diterima' ? 'disabled' : '' }}

</div>

<div>

<label>Tanggal Mulai</label>

<input
type="date"
name="tanggal_mulai"
value="{{ old('tanggal_mulai',$mahasiswa->tanggal_mulai) }}"
class="w-full rounded-xl border border-bordercolor bg-background p-3">
{{ $mahasiswa->status != 'diterima' ? 'disabled' : '' }}

</div>

<div>

<label>Tanggal Selesai</label>

<input
type="date"
name="tanggal_selesai"
value="{{ old('tanggal_selesai',$mahasiswa->tanggal_selesai) }}"
class="w-full rounded-xl border border-bordercolor bg-background p-3">
{{ $mahasiswa->status != 'diterima' ? 'disabled' : '' }}

</div>

</div>

<div class="flex justify-end gap-4">

<a
href="{{ route('mahasiswa.index') }}"
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