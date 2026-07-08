<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $fillable = [
        'mahasiswa_id',
        'mentor_id',
        'operator_id',
        'disiplin',
        'tanggung_jawab',
        'komunikasi',
        'kemampuan_teknis',
        'kerja_sama',
        'inisiatif',
        'etika_kerja',
        'nilai_akhir',
        'catatan',
        'rekomendasi'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }

    public function operator()
    {
        return $this->belongsTo(Operator::class);
    }
}