<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Unit;
use App\Models\Kelas;
use App\Models\Subkelas;
use App\Models\Siswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    private $units;
    private $kelas;
    private $subs;
    private $users;
            
    public function __construct()
    {
        $this->units = Unit::select('id', 'unit')->get();
        $this->kelas = Kelas::select('id', 'kelas')->get();
        $this->subs = Subkelas::select('id', 'sub')->get();
        $this->users = User::select('id', 'email')->get();
    }

    public function model(array $row)
        {
            $rem = Str::random(60);
            
            // if ($row[2] === 'siswa') {
            //     $pass = $row[1];
            // } elseif ($row[2] === 'guru') {
            //     $pass = 'guru123**';
            // }
            $unit = $this->units->where('unit', $row[3])->first();
            $kelas = $this->kelas->where('kelas', $row[4])->first();
            $sub = $this->subs->where('sub', $row[5])->first();
            $user = $this->users->where('email', $row[1])->first();
            return new Siswa([
                'nama' => $row[0],
                'email' => $row[1],
                'nisn' => $row[2],
                'unit_id' => $unit->id ?? NULL,
                'kelas_id' => $kelas->id ?? NULL,
                'sub_id' => $sub->id ?? NULL,
                'user_id' => $user->id ?? NULL,
            ]);
        }    
}
