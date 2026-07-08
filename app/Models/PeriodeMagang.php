<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeriodeMagang extends Model
{
    protected $fillable = [
        'nama_periode',
        'tanggal_mulai',
        'tanggal_selesai',
        'status'
    ];

    public function lowongans()
    {
        return $this->hasMany(Lowongan::class);
    }

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}