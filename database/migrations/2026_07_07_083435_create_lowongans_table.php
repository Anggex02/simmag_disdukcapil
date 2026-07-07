<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lowongans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('operator_id')
                ->constrained('operators')
                ->cascadeOnDelete();

            $table->foreignId('periode_magang_id')
                ->constrained('periode_magangs')
                ->cascadeOnDelete();

            $table->string('judul');
            $table->text('deskripsi');

            $table->integer('kuota');

            $table->enum('status', [
                'dibuka',
                'ditutup'
            ])->default('dibuka');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lowongans');
    }
};