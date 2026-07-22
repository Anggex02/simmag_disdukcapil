<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PendaftaranMagang;

class Mentor extends Model
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

   public function pendaftaranMagangs()
{
    return $this->hasMany(PendaftaranMagang::class);
}

    public function penilaians()
    {
        return $this->hasMany(Penilaian::class);
    }
}