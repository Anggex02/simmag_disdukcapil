@extends('layouts.app')

@section('title','Assign Mentor')

@section('sidebar')
@include('layouts.sidebar.sidebar-operator')
@endsection

@section('content')

<div class="max-w-xl mx-auto">

    <div class="bg-card rounded-2xl p-8 border border-bordercolor">

        <h2 class="text-2xl font-bold mb-6">

            Assign Mentor

        </h2>

        <form
            method="POST"
            action="{{ route('mahasiswa.updateMentor',$mahasiswa->id) }}"
        >

            @csrf
            @method('PUT')

            <div class="mb-5">

                <label class="block mb-2">

                    Mahasiswa

                </label>

                <input
                    type="text"
                    readonly
                    value="{{ $mahasiswa->user->name }}"
                    class="w-full rounded-xl p-3 bg-background"
                >

            </div>

            <div class="mb-6">

                <label class="block mb-2">

                    Mentor

                </label>

                <select
                    name="mentor_id"
                    class="w-full rounded-xl p-3 bg-background"
                >

                    @foreach($mentors as $mentor)

                    <option
                        value="{{ $mentor->id }}"
                        @selected($mahasiswa->mentor_id==$mentor->id)
                    >

                        {{ $mentor->nama }}

                    </option>

                    @endforeach

                </select>

            </div>

            <button
                class="bg-primary px-6 py-3 rounded-xl"
            >

                Simpan

            </button>

        </form>

    </div>

</div>

@endsection