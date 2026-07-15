@extends('layouts.app')

@section('title','Logbook')

@section('sidebar')
@include('layouts.sidebar.sidebar-mahasiswa')
@endsection

@section('content')

<x-ui.card>

    <h1 class="text-3xl font-bold">
        Logbook
    </h1>

    <p class="text-textsecondary mt-4">
        Fitur Logbook sedang dalam pengembangan.
    </p>

</x-ui.card>

@endsection