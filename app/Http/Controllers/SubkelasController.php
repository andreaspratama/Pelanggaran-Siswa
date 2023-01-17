<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subkelas;
use App\Models\Kelas;
use App\Http\Requests\SubkelasRequest;
// use Yajra\DataTables\Facades\DataTables;

class SubkelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Subkelas::orderBy('id', 'desc')->get();

        return view('pages.admin.subkelas.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();

        return view('pages.admin.subkelas.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubkelasRequest $request)
    {
        $data = $request->all();
        Subkelas::create($data);

        return redirect()->route('subkelas.index')->with('success', 'Data Berhasil Ditambah');
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
        $item = Subkelas::findOrFail($id);
        $unit = Kelas::all();

        return view('pages.admin.subkelas.edit', compact('item', 'kelas'));
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
        $item = Subkelas::findOrFail($id);
        $item->update($data);

        return redirect()->route('subkelas.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Subkelas::findOrFail($id);
        $item->delete();

        return redirect()->route('subkelas.index')->with('success', 'Data Berhasil Dihapus');
    }
}
