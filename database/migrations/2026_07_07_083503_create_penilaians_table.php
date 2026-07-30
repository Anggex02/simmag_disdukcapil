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
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('mentor_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->integer('disiplin')->default(0);

            $table->integer('kerjasama')->default(0);

            $table->integer('komunikasi')->default(0);

            $table->integer('tanggung_jawab')->default(0);

            $table->integer('inisiatif')->default(0);

            $table->decimal('nilai_akhir',5,2)->default(0);

            $table->text('catatan')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penilaians');
    }
};