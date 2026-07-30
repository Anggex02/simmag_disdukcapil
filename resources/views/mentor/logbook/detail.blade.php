@extends('layouts.app')

@section('title', 'Logbook Mahasiswa')

@section('sidebar')
    @include('layouts.sidebar.sidebar-mentor')
@endsection

@section('content')

    <div class="space-y-6">

        <h1 class="text-3xl font-bold text-white">

            {{ $mahasiswa->user->name }}

        </h1>

        <x-ui.card>

            <table class="w-full">

                <thead>

                    <tr>

                        <th>Tanggal</th>

                        <th>Status</th>

                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($mahasiswa->logbooks as $logbook)

                        <tr class="border-t border-border">

                            <td class="py-4">

                                {{ $logbook->tanggal }}

                            </td>

                            <td>

                                {{ ucfirst($logbook->status) }}

                            </td>

                            <td>

                                <a href="{{ route('mentor.logbook.show', [$mahasiswa->id, $logbook->id]) }}"
                                    class="bg-primary text-white px-3 py-2 rounded">

                                    Detail

                                </a>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </x-ui.card>

    </div>

@endsection