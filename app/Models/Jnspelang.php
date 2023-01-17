<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jnspelang extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pelanggaran()
    {
        return $this->hasMany(Pelanggaran::class);
    }
}
