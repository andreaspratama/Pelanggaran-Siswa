<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keluarga;
use App\Models\Datadiri;

class KeluargaController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        $dd = Datadiri::all();

        return view('pages.admin.keluarga.create', compact('dd'));
    }
}
