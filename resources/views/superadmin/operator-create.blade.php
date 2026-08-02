@extends('layouts.app')

@section('title', 'Tambah Operator')

@section('sidebar')
    @include('layouts.sidebar.sidebar-superadmin')
@endsection

@section('content')

    <h1 class="text-3xl font-bold text-primary mb-6">
        Tambah Operator
    </h1>

    <form action="{{ route('operator.store') }}" method="POST">

        @csrf

        <div class="space-y-4">

            <input type="text" name="name" placeholder="Nama Operator"
                class="w-full rounded-xl p-3 bg-background border border-bordercolor text-primary">

            <input type="email" name="email" placeholder="Email"
                class="w-full rounded-xl p-3 bg-background border border-bordercolor text-primary">

            <input type="text" name="no_hp" placeholder="No HP"
                class="w-full rounded-xl p-3 bg-background border border-bordercolor text-primary">

            <input type="text" name="nip" placeholder="NIP" value="{{ old('nip') }}"
                class="w-full rounded-xl border border-bordercolor bg-background p-3 text-primary">

            <input type="text" name="jabatan" placeholder="Jabatan" value="{{ old('jabatan') }}"
                class="w-full rounded-xl border border-bordercolor bg-background p-3 text-primary">

            <input type="password" name="password" placeholder="Password"
                class="w-full rounded-xl p-3 bg-background border border-bordercolor text-primary">

            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                class="w-full rounded-xl p-3 bg-background border border-bordercolor text-primary">

            <button class="bg-primary px-6 py-3 rounded-xl text-white">

                Simpan

            </button>

        </div>

    </form>

@endsection