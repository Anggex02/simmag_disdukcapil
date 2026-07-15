@extends('layouts.app')

@section('title','Pengumuman')

@section('sidebar')
@include('layouts.sidebar.sidebar-mahasiswa')
@endsection

@section('content')

<x-ui.card>

    <h1 class="text-3xl font-bold">
        Pengumuman
    </h1>

    <p class="text-textsecondary mt-4">
        Fitur Pengumuman sedang dalam pengembangan.
    </p>

</x-ui.card>

@endsection