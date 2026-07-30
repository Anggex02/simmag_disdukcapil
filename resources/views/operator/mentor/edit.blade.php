@extends('layouts.app')

@section('title','Edit Mentor')

@section('sidebar')
    @include('layouts.sidebar.sidebar-operator')
@endsection

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-card border border-bordercolor rounded-2xl p-8">

        <h1 class="text-3xl font-bold mb-6">
            Edit Mentor
        </h1>

        <form action="{{ route('mentor.update',$mentor->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-6">

                <div>

                    <label>Nama</label>

                    <input
                        type="text"
                        name="name"
                        value="{{ $mentor->user->name }}"
                        class="w-full rounded-xl bg-background border border-bordercolor p-3">

                </div>

                <div>

                    <label>Email</label>

                    <input
                        type="email"
                        name="email"
                        value="{{ $mentor->user->email }}"
                        class="w-full rounded-xl bg-background border border-bordercolor p-3">

                </div>

                <div>

                    <label>No HP</label>

                    <input
                        type="text"
                        name="no_hp"
                        value="{{ $mentor->no_hp }}"
                        class="w-full rounded-xl bg-background border border-bordercolor p-3">

                </div>

                <div>

                    <label>NIP</label>

                    <input
                        type="text"
                        name="nip"
                        value="{{ $mentor->nip }}"
                        class="w-full rounded-xl bg-background border border-bordercolor p-3">

                </div>

                <div class="col-span-2">

                    <label>Jabatan</label>

                    <input
                        type="text"
                        name="jabatan"
                        value="{{ $mentor->jabatan }}"
                        class="w-full rounded-xl bg-background border border-bordercolor p-3">

                </div>

            </div>

            <div class="flex justify-end gap-3 mt-8">

                <a href="{{ route('mentor.index') }}"
                   class="px-5 py-3 rounded-xl bg-gray-600">

                    Batal

                </a>

                <button
                    class="px-5 py-3 rounded-xl bg-primary">

                    Update

                </button>

            </div>

        </form>

    </div>

</div>

@endsection