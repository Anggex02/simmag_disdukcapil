<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftaran_magangs', function (Blueprint $table) {

            $table->id();

            // Relasi
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->foreignId('periode_magang_id')->constrained()->cascadeOnDelete();

            // Data Mahasiswa
            $table->string('nim');
            $table->string('universitas');
            $table->string('program_studi');
            $table->tinyInteger('semester');

            $table->string('no_hp');
            $table->text('alamat');

            // Dokumen
            $table->string('cv');
            $table->string('surat_pengantar');

            // Status
            $table->enum('status', [
                'menunggu',
                'diterima',
                'ditolak'
            ])->default('menunggu');

            // Catatan Operator
            $table->text('catatan_operator')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_magangs');
    }
};