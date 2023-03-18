<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function sub()
    {
        return $this->belongsTo(Subkelas::class);
    }

    public function pelanggaran()
    {
        return $this->hasMany(Pelanggaran::class);
    }

    public function pelanggarank1()
    {
        return $this->hasMany(Pelanggarank1::class);
    }
    
    public function pelanggarank2()
    {
        return $this->hasMany(Pelanggarank2::class);
    }

    public function pelanggarank3()
    {
        return $this->hasMany(Pelanggarank3::class);
    }

    public function pelanggaransmp()
    {
        return $this->hasMany(Pelanggaransmp::class);
    }

    public function pelanggaransma()
    {
        return $this->hasMany(Pelanggaransma::class);
    }
}
