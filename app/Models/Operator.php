<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $fillable = [
        'user_id',
        'nip',
        'nama',
        'jabatan',
        'no_hp'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lowongans()
    {
        return $this->hasMany(Lowongan::class);
    }

    public function penilaians()
    {
        return $this->hasMany(Penilaian::class);
    }
}