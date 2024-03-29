<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function wk()
    {
        return $this->hasMany(Wk::class);
    }

    public function gb()
    {
        return $this->hasMany(Gb::class);
    }

    public function userUnit()
    {
        return $this->hasMany(User::class);
    }
}
