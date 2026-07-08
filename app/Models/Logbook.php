<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    protected $fillable = [
        'mahasiswa_id',
        'tanggal',
        'kegiatan',
        'kendala',
        'hasil_pekerjaan',
        'bukti_kegiatan',
        'status',
        'komentar_mentor'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}