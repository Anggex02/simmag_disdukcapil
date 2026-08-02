@extends('layouts.app')

@section('title', 'Penilaian Mahasiswa')

@section('sidebar')
    @include('layouts.sidebar.sidebar-mentor')
@endsection

@section('content')

    <div class="space-y-6">

        <div>

            <h1 class="text-3xl font-bold text-primary">
                Penilaian Mahasiswa
            </h1>

            <p class="text-primary mt-2">
                {{ $mahasiswa->user->name }}
            </p>

        </div>

        <x-ui.card>

            <form action="{{ route('mentor.penilaian.update', $mahasiswa->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label class="text-textsecondary">Disiplin</label>
                        <input type="number" name="disiplin" min="0" max="100"
                            value="{{ old('disiplin', $mahasiswa->penilaian->disiplin ?? 0) }}"
                            class="nilai mt-2 w-full rounded-lg bg-background border border-border text-primary px-4 py-3">
                    </div>

                    <div>
                        <label class="text-textsecondary">Tanggung Jawab</label>
                        <input type="number" name="tanggung_jawab" min="0" max="100"
                            value="{{ old('tanggung_jawab', $mahasiswa->penilaian->tanggung_jawab ?? 0) }}"
                            class="nilai mt-2 w-full rounded-lg bg-background border border-border text-primary px-4 py-3">
                    </div>

                    <div>
                        <label class="text-textsecondary">Komunikasi</label>
                        <input type="number" name="komunikasi" min="0" max="100"
                            value="{{ old('komunikasi', $mahasiswa->penilaian->komunikasi ?? 0) }}"
                            class="nilai mt-2 w-full rounded-lg bg-background border border-border text-primary px-4 py-3">
                    </div>

                    <div>
                        <label class="text-textsecondary">Kemampuan Teknis</label>
                        <input type="number" name="kemampuan_teknis" min="0" max="100"
                            value="{{ old('kemampuan_teknis', $mahasiswa->penilaian->kemampuan_teknis ?? 0) }}"
                            class="nilai mt-2 w-full rounded-lg bg-background border border-border text-primary px-4 py-3">
                    </div>

                    <div>
                        <label class="text-textsecondary">Kerja Sama</label>
                        <input type="number" name="kerja_sama" min="0" max="100"
                            value="{{ old('kerja_sama', $mahasiswa->penilaian->kerja_sama ?? 0) }}"
                            class="nilai mt-2 w-full rounded-lg bg-background border border-border text-primary px-4 py-3">
                    </div>

                    <div>
                        <label class="text-textsecondary">Inisiatif</label>
                        <input type="number" name="inisiatif" min="0" max="100"
                            value="{{ old('inisiatif', $mahasiswa->penilaian->inisiatif ?? 0) }}"
                            class="nilai mt-2 w-full rounded-lg bg-background border border-border text-primary px-4 py-3">
                    </div>

                    <div>
                        <label class="text-textsecondary">Etika Kerja</label>
                        <input type="number" name="etika_kerja" min="0" max="100"
                            value="{{ old('etika_kerja', $mahasiswa->penilaian->etika_kerja ?? 0) }}"
                            class="nilai mt-2 w-full rounded-lg bg-background border border-border text-primary px-4 py-3">
                    </div>

                    <div>
                        <label class="text-textsecondary">Nilai Akhir</label>
                        <input type="text" id="nilai_akhir" readonly
                            class="mt-2 w-full rounded-lg bg-gray-700 border border-border text-primary px-4 py-3">
                    </div>

                    <div class="md:col-span-2">

                        <label class="text-textsecondary">
                            Catatan Mentor
                        </label>

                        <textarea name="catatan" rows="5"
                            class="mt-2 w-full rounded-lg bg-background border border-border text-primary px-4 py-3">{{ old('catatan', $mahasiswa->penilaian->catatan ?? '') }}</textarea>

                    </div>

                </div>

                <div class="mt-8">

                    <button class="bg-primary hover:opacity-90 text-white px-8 py-3 rounded-lg">
                        Simpan Penilaian
                    </button>

                </div>

            </form>

        </x-ui.card>

    </div>

    <script>

        function hitungNilai() {

            let total = 0;
            let jumlah = 0;

            document.querySelectorAll('.nilai').forEach(function (input) {

                total += parseFloat(input.value) || 0;
                jumlah++;

            });

            document.getElementById('nilai_akhir').value = (total / jumlah).toFixed(2);

        }

        document.querySelectorAll('.nilai').forEach(function (input) {

            input.addEventListener('input', hitungNilai);

        });

        hitungNilai();

    </script>

@endsection