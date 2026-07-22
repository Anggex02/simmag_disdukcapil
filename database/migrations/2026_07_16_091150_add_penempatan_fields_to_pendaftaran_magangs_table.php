<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pendaftaran_magangs', function (Blueprint $table) {


            $table->string('divisi')->nullable()->after('mentor_id');

            $table->date('tanggal_mulai')->nullable()->after('divisi');

            $table->date('tanggal_selesai')->nullable()->after('tanggal_mulai');

        });
    }

    public function down(): void
    {
        Schema::table('pendaftaran_magangs', function (Blueprint $table) {

            $table->dropColumn([
                'mentor_id',
                'divisi',
                'tanggal_mulai',
                'tanggal_selesai'
            ]);

        });
    }
};