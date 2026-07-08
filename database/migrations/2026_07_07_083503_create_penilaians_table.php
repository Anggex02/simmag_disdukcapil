<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penilaians', function (Blueprint $table) {

            $table->id();

            $table->foreignId('mahasiswa_id')
                ->constrained('mahasiswas')
                ->cascadeOnDelete();

            $table->foreignId('mentor_id')
                ->constrained('mentors')
                ->cascadeOnDelete();

            $table->foreignId('operator_id')
                ->constrained('operators')
                ->cascadeOnDelete();

            $table->integer('disiplin');

            $table->integer('tanggung_jawab');

            $table->integer('komunikasi');

            $table->integer('kemampuan_teknis');

            $table->integer('kerja_sama');

            $table->integer('inisiatif');

            $table->integer('etika_kerja');

            $table->decimal('nilai_akhir',5,2);

            $table->text('catatan')->nullable();

            $table->text('rekomendasi')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penilaians');
    }
};