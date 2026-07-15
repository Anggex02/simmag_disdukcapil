@extends('layouts.app')

@section('title','Edit Mahasiswa')

@section('sidebar')
@include('layouts.sidebar.sidebar-operator')
@endsection

@section('content')

<div class="max-w-3xl mx-auto">

<form action="{{ route('mahasiswa.update',$mhs->id) }}" method="POST">

@csrf
@method('PUT')

<div class="space-y-5">

<div>

<label>Nama</label>

<input
type="text"
name="name"
value="{{ old('name',$mhs->user->name) }}"
class="w-full rounded-xl border border-bordercolor bg-background p-3">

</div>

<div>

<label>Email</label>

<input
type="email"
name="email"
value="{{ old('email',$mhs->user->email) }}"
class="w-full rounded-xl border border-bordercolor bg-background p-3">

</div>

<div>

<label>NIM</label>

<input
type="text"
name="nim"
value="{{ old('nim',$mhs->nim) }}"
class="w-full rounded-xl border border-bordercolor bg-background p-3">

</div>

<div>

<label>Universitas</label>

<input
type="text"
name="universitas"
value="{{ old('universitas',$mhs->universitas) }}"
class="w-full rounded-xl border border-bordercolor bg-background p-3">

</div>

<div>

<label>Program Studi</label>

<input
type="text"
name="program_studi"
value="{{ old('program_studi',$mhs->program_studi) }}"
class="w-full rounded-xl border border-bordercolor bg-background p-3">

</div>

<div>

<label>Semester</label>

<input
type="number"
name="semester"
value="{{ old('semester',$mhs->semester) }}"
class="w-full rounded-xl border border-bordercolor bg-background p-3">

</div>

<div>

<label>No HP</label>

<input
type="text"
name="no_hp"
value="{{ old('no_hp',$mhs->no_hp) }}"
class="w-full rounded-xl border border-bordercolor bg-background p-3">

</div>

<div>

<label>Alamat</label>

<textarea
name="alamat"
rows="4"
class="w-full rounded-xl border border-bordercolor bg-background p-3">{{ old('alamat',$mhs->alamat) }}</textarea>

</div>

<div class="flex justify-end gap-3">

<a
href="{{ route('mahasiswa.index') }}"
class="px-5 py-3 rounded-xl bg-gray-500 text-white">

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