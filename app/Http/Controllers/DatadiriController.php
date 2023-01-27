<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datadiri;
use App\Models\Keluarga;

class DatadiriController extends Controller
{
    public function index()
    {
        $items = Datadiri::all();

        return view('pages.admin.datadiri.index', compact('items'));
    }

    public function create()
    {
        return view('pages.admin.datadiri.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Datadiri::create($data);

        return redirect()->route('datadiriIndex');
    }

    public function show($id)
    {
        $item = Datadiri::findOrFail($id);
        $data = Keluarga::all();

        return view('pages.admin.datadiri.show', compact('item', 'data'));
    }
}
