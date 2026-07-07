<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dokumens', function (Blueprint $table) {

            $table->id();

            $table->foreignId('mahasiswa_id')
                ->constrained('mahasiswas')
                ->cascadeOnDelete();

            $table->enum('jenis',[
                'cv',
                'surat_pengantar',
                'ktm',
                'proposal'
            ]);

            $table->string('file');

            $table->enum('status',[
                'menunggu',
                'valid',
                'revisi'
            ])->default('menunggu');

            $table->text('catatan')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokumens');
    }
};