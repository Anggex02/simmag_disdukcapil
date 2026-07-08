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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->foreignId('mentor_id')
                  ->nullable()
                  ->constrained('mentors')
                  ->nullOnDelete();

            $table->foreignId('periode_magang_id')
                  ->nullable()
                  ->constrained('periode_magangs')
                  ->nullOnDelete();

            $table->string('nim')->unique();
            $table->string('universitas');
            $table->string('jurusan');
            $table->string('no_hp', 20);
            $table->text('alamat');
            $table->string('foto')->nullable();

            $table->timestamps();
            $table->enum('status', [
            'belum_magang',
            'aktif',
            'selesai'
        ])->default('belum_magang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};