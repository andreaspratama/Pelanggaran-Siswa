<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coba extends Model
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
}
