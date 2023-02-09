<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Unit;
use App\Http\Requests\KelasRequest;
// use Yajra\DataTables\Facades\DataTables;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Kelas::orderBy('id', 'desc')->get();

        return view('pages.admin.kelas.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = Unit::all();

        return view('pages.admin.kelas.create', compact('unit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KelasRequest $request)
    {
        $kelas = new Kelas;
        $kelas->unit_id = $request->unit_id;
        $kelas->kelas = $request->kelas;
        $kelas->save();

        return redirect()->route('kelas.index')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Kelas::findOrFail($id);
        $unit = Unit::all();

        return view('pages.admin.kelas.edit', compact('item', 'unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $item = Kelas::findOrFail($id);
        $item->update($data);

        return redirect()->route('kelas.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Kelas::findOrFail($id);
        $item->delete();

        return redirect()->route('kelas.index')->with('success', 'Data Berhasil Dihapus');
    }
}
