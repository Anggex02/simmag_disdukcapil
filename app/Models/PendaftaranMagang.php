<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendaftaranMagang extends Model
{
    protected $fillable = [
    'user_id',
    'mentor_id',
    'periode_magang_id',
    'nim',
    'universitas',
    'program_studi',
    'semester',
    'no_hp',
    'alamat',
    'cv',
    'surat_pengantar',
    'status',
    'catatan_operator',
    ];

    /**
     * Relasi ke User (Mahasiswa)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Periode Magang
     */
    public function periodeMagang()
    {
        return $this->belongsTo(PeriodeMagang::class);
    }

    public function mentor()
{
    return $this->belongsTo(Mentor::class);
}
}