<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('logbooks', function (Blueprint $table) {

            $table->id();

            $table->foreignId('mahasiswa_id')
                ->constrained('mahasiswas')
                ->cascadeOnDelete();

            $table->date('tanggal');

            $table->text('kegiatan');

            $table->text('kendala')->nullable();

            $table->text('hasil_pekerjaan');

            $table->string('bukti_kegiatan')->nullable();

            $table->enum('status', [
                'menunggu',
                'disetujui',
                'revisi'
            ])->default('menunggu');

            $table->text('komentar_mentor')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('logbooks');
    }
};