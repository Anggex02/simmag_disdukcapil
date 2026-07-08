<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    protected $fillable = [
        'mahasiswa_id',
        'lowongan_id',
        'status',
        'catatan',
        'tanggal_lamaran'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }
}