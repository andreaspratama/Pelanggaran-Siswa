<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thnakademik;
use App\Http\Requests\ThnakademikRequest;

class ThnakademikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Thnakademik::orderBy('id', 'desc')->get();

        return view('pages.admin.thnakademik.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.thnakademik.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Thnakademik::create($data);

        return redirect()->route('thnakademik.index')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Thnakademik::findOrFail($id);

        return view('pages.admin.thnakademik.edit', compact('item'));
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
        $item = Thnakademik::findOrFail($id);
        $item->update($data);

        return redirect()->route('thnakademik.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Thnakademik::findOrFail($id);
        $item->delete();

        return redirect()->route('thnakademik.index')->with('success', 'Data Berhasil Dihapus');
    }
}
