@extends('layouts.app')

@section('title', 'Dashboard Super Admin')

@section('sidebar')
    @include('layouts.sidebar.sidebar-superadmin')
@endsection

@section('content')

<div class="space-y-8">

    <div>
        <h1 class="text-3xl font-bold">
            Dashboard
        </h1>

        <p class="text-textsecondary mt-2">
            Selamat datang di Sistem Magang Disdukcapil.
        </p>
    </div>

</div>

@endsection