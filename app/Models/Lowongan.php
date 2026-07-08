<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    protected $fillable = [
        'operator_id',
        'periode_magang_id',
        'judul',
        'deskripsi',
        'kuota',
        'status'
    ];

    public function operator()
    {
        return $this->belongsTo(Operator::class);
    }

    public function periodeMagang()
    {
        return $this->belongsTo(PeriodeMagang::class);
    }

    public function lamarans()
    {
        return $this->hasMany(Lamaran::class);
    }
}