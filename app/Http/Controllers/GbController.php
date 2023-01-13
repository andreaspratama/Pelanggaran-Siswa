<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gb;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\GbRequest;
// use Yajra\DataTables\Facades\DataTables;

class GbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Gb::orderBy('id', 'desc')->get();

        return view('pages.admin.gb.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.gb.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GbRequest $request)
    {
        // Insert ke table user
        $user = new User;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('guru123**');
        $user->role = 'gurubk';
        $user->save();

        // Insert ke table gb
        $request->request->add(['user_id' => $user->id]);
        $gb = $request->all();
        $gb['ttd'] = request()->file('ttd')->store('assets/gttd', 'public');
        Gb::create($gb);
        
        return redirect()->route('gb.index')->with('success', 'Data Berhasil Ditambah');
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
        $item = Gb::findOrFail($id);

        return view('pages.admin.gb.edit', compact('item'));
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
        $ubah = Gb::findOrFail($id);
        $awal = $ubah->ttd;

        $md = [
            'nama' => $request['nama'],
            'email' => $request['email'],
            'ttd' => $awal,
        ];

        $request->ttd->move(public_path().'/storage/assets/gttd', $awal);
        $ubah->update($md);

        return redirect()->route('gb.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Gb::findOrFail($id);
        $item->delete();

        return redirect()->route('gb.index')->with('success', 'Data Berhasil Dihapus');
    }
}
