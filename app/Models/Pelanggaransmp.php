<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggaransmp extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function sub()
    {
        return $this->belongsTo(Subkelas::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function wk()
    {
        return $this->belongsTo(Wk::class);
    }

    public function jnspelang()
    {
        return $this->belongsTo(Jnspelang::class);
    }
}
