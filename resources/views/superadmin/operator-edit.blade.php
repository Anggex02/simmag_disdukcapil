@extends('layouts.app')

@section('title','Edit Operator')

@section('sidebar')
@include('layouts.sidebar.sidebar-superadmin')
@endsection

@section('content')

<div class="max-w-3xl mx-auto">

    <h1 class="text-3xl font-bold mb-6">
        Edit Operator
    </h1>

    <form action="{{ route('operator.update',$operator->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="space-y-5">

            <div>
                <label>Nama</label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name',$operator->user->name) }}"
                    class="w-full rounded-xl border border-bordercolor bg-background p-3">
            </div>

            <div>
                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email',$operator->user->email) }}"
                    class="w-full rounded-xl border border-bordercolor bg-background p-3">
            </div>

            <div>
                <label>No HP</label>

                <input
                    type="text"
                    name="no_hp"
                    value="{{ old('no_hp',$operator->no_hp) }}"
                    class="w-full rounded-xl border border-bordercolor bg-background p-3">
            </div>

            <div>
                <label>NIP</label>

                <input
                    type="text"
                    name="nip"
                    value="{{ old('nip',$operator->nip) }}"
                    class="w-full rounded-xl border border-bordercolor bg-background p-3">
            </div>

            <div>
                <label>Jabatan</label>

                <input
                    type="text"
                    name="jabatan"
                    value="{{ old('jabatan',$operator->jabatan) }}"
                    class="w-full rounded-xl border border-bordercolor bg-background p-3">
            </div>

            <div class="flex justify-end gap-3">

                <a href="{{ route('operator.index') }}"
                    class="px-5 py-3 rounded-xl bg-gray-500 text-white">

                    Batal

                </a>

                <button
                    type="submit"
                    class="px-5 py-3 rounded-xl bg-primary text-white">

                    Simpan

                </button>

            </div>

        </div>

    </form>

</div>

@endsection