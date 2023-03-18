<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\User;
use App\Models\Unit;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\GuruRequest;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = guru::orderBy('id', 'desc')->get();

        return view('pages.admin.guru.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = Unit::all();

        return view('pages.admin.guru.create', compact('unit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Insert ke table user
        $user = new User;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('guru123**');
        $user->role = 'guru';
        $user->unit_id = $request->unit_id;
        $user->save();

        // Insert ke table wk
        $request->request->add(['user_id' => $user->id]);
        $guru = $request->all();
        $guru['ttd'] = request()->file('ttd')->store('assets/gttd', 'public');
        Guru::create($guru);
        
        return redirect()->route('guru.index')->with('success', 'Data Berhasil Ditambah');
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
        $item = Guru::findOrFail($id);
        $unit = Unit::all();

        return view('pages.admin.guru.edit', compact('item', 'unit'));
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
        $guru = Guru::findOrFail($id);
        $s = ('public/'.$guru->ttd);
        // dd($s);

        if(request('ttd')) {
            Storage::disk('local')->delete($s);
            $image = request()->file('ttd')->store('assets/gttd', 'public');
        } elseif($guru->ttd) {
            $image = $guru->ttd;
        } else {
            $image = null;
        }

        $guru->nama = $request->nama;
        $guru->email = $request->email;
        $guru->ttd = $image;
        $guru->save();

        $update_guru = $guru->user_id;
        $uguru = User::findOrFail($update_guru);
        $uguru->name = $request->nama;
        $uguru->email = $request->email;
        $uguru->save();

        return redirect()->route('guru.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Guru::findOrFail($id);
        $item->delete();

        return redirect()->route('guru.index')->with('success', 'Data Berhasil Dihapus');
    }
}
