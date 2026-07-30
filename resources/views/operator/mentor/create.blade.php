@extends('layouts.app')

@section('title','Tambah Mentor')

@section('sidebar')
    @include('layouts.sidebar.sidebar-operator')
@endsection

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-card border border-bordercolor rounded-2xl p-8">

        <h1 class="text-3xl font-bold mb-6">
            Tambah Mentor
        </h1>

        <form action="{{ route('mentor.store') }}" method="POST">

            @csrf

            <div class="grid grid-cols-2 gap-6">

                <div>
                    <label>Nama</label>

                    <input
                        type="text"
                        name="name"
                        class="w-full rounded-xl bg-background border border-bordercolor p-3"
                        required>
                </div>

                <div>
                    <label>Email</label>

                    <input
                        type="email"
                        name="email"
                        class="w-full rounded-xl bg-background border border-bordercolor p-3"
                        required>
                </div>

                <div>
                    <label>No HP</label>

                    <input
                        type="text"
                        name="no_hp"
                        class="w-full rounded-xl bg-background border border-bordercolor p-3"
                        required>
                </div>

                <div>
                    <label>NIP</label>

                    <input
                        type="text"
                        name="nip"
                        class="w-full rounded-xl bg-background border border-bordercolor p-3"
                        required>
                </div>

                <div class="col-span-2">
                    <label>Jabatan</label>

                    <input
                        type="text"
                        name="jabatan"
                        class="w-full rounded-xl bg-background border border-bordercolor p-3"
                        required>
                </div>

                <div>
                    <label>Password</label>

                    <input
                        type="password"
                        name="password"
                        class="w-full rounded-xl bg-background border border-bordercolor p-3"
                        required>
                </div>

                <div>
                    <label>Konfirmasi Password</label>

                    <input
                        type="password"
                        name="password_confirmation"
                        class="w-full rounded-xl bg-background border border-bordercolor p-3"
                        required>
                </div>

            </div>

            <div class="flex justify-end gap-3 mt-8">

                <a href="{{ route('mentor.index') }}"
                   class="px-5 py-3 rounded-xl bg-gray-600">

                    Batal

                </a>

                <button
                    class="px-5 py-3 rounded-xl bg-primary">

                    Simpan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection