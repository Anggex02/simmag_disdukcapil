<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = [
        'user_id',
        'mentor_id',
        'periode_magang_id',
        'nim',
        'universitas',
        'jurusan',
        'no_hp',
        'alamat',
        'foto',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }

    public function periodeMagang()
    {
        return $this->belongsTo(PeriodeMagang::class);
    }

    public function lamarans()
    {
        return $this->hasMany(Lamaran::class);
    }

    public function dokumens()
    {
        return $this->hasMany(Dokumen::class);
    }

    public function logbooks()
    {
        return $this->hasMany(Logbook::class);
    }

    public function penilaian()
    {
        return $this->hasOne(Penilaian::class);
    }
}