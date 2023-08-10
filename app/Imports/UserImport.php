<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Unit;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
    private $units;
            
    public function __construct()
    {
        $this->units = Unit::select('id', 'unit')->get();
    }

    public function model(array $row)
        {
            $rem = Str::random(60);
            
            // if ($row[2] === 'siswa') {
            //     $pass = $row[1];
            // } elseif ($row[2] === 'guru') {
            //     $pass = 'guru123**';
            // }
            $unit = $this->units->where('unit', $row[4])->first();
            return new User([
                'name' => $row[0],
                'email' => $row[1],
                'password' => bcrypt($row[2]),
                'remember_token' => $rem,
                'role' => $row[3],
                'unit_id' => $unit->id ?? NULL,
            ]);
        }    
}
