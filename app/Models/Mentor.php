<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'nip',
        'jabatan',
        'no_hp'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mahasiswas()
{
    return $this->hasMany(
        Mahasiswa::class,
        'mentor_id'
    );
}

    public function penilaians()
    {
        return $this->hasMany(Penilaian::class);
    }
}