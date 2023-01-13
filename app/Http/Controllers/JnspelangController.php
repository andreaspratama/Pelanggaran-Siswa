<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jnspelang;
use App\Http\Requests\JnspelangRequest;
// use Yajra\DataTables\Facades\DataTables;

class JnspelangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Jnspelang::orderBy('id', 'desc')->get();

        return view('pages.admin.jnspelang.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.jnspelang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JnspelangRequest $request)
    {
        $data = $request->all();
        Jnspelang::create($data);

        return redirect()->route('jnspelang.index')->with('success', 'Data Berhasil Ditambah');
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
        $item = Jnspelang::findOrFail($id);

        return view('pages.admin.jnspelang.edit', compact('item'));
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
        $item = Jnspelang::findOrFail($id);
        $item->update($data);

        return redirect()->route('jnspelang.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Jnspelang::findOrFail($id);
        $item->delete();

        return redirect()->route('jnspelang.index')->with('success', 'Data Berhasil Dihapus');
    }
}
