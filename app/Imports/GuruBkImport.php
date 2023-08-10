<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Unit;
use App\Models\GB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;

class GuruBkImport implements ToModel
{
    private $units;
    private $users;
            
    public function __construct()
    {
        $this->units = Unit::select('id', 'unit')->get();
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
            $user = $this->users->where('email', $row[1])->first();
            return new Gb([
                'nama' => $row[0],
                'email' => $row[1],
                'ttd' => $row[2],
                'unit_id' => $unit->id ?? NULL,
                'user_id' => $user->id ?? NULL,
            ]);
        }    
}
