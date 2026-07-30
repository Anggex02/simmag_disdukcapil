<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $fillable = [

        'mahasiswa_id',

        'mentor_id',

        'disiplin',

        'kerjasama',

        'komunikasi',

        'tanggung_jawab',

        'inisiatif',

        'nilai_akhir',

        'catatan'

    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }
}