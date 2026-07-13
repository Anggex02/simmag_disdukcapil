<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Universitas extends Model
{
    protected $fillable = [

        'nama_universitas',
        'alamat',
        'website',
        'is_active',

    ];

    public function programStudis()
    {
        return $this->hasMany(ProgramStudi::class);
    }
}