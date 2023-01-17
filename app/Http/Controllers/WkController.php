<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wk;
use App\Models\User;
use App\Models\Unit;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\WkRequest;
// use Yajra\DataTables\Facades\DataTables;

class WkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Wk::orderBy('id', 'desc')->get();

        return view('pages.admin.wk.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = Unit::all();

        return view('pages.admin.wk.create', compact('unit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WkRequest $request)
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
        $wk = $request->all();
        $wk['ttd'] = request()->file('ttd')->store('assets/gttd', 'public');
        Wk::create($wk);
        
        return redirect()->route('wk.index')->with('success', 'Data Berhasil Ditambah');
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
        $item = Wk::findOrFail($id);
        $unit = Unit::all();

        return view('pages.admin.wk.edit', compact('item', 'unit'));
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
        $wk = Wk::findOrFail($id);
        $s = ('public/'.$wk->ttd);
        // dd($s);

        if(request('ttd')) {
            Storage::disk('local')->delete($s);
            $image = request()->file('ttd')->store('assets/gttd', 'public');
        } elseif($wk->ttd) {
            $image = $wk->ttd;
        } else {
            $image = null;
        }

        $wk->nama = $request->nama;
        $wk->email = $request->email;
        $wk->ttd = $image;
        $wk->save();

        $update_wk = $wk->user_id;
        $uwk = User::findOrFail($update_wk);
        $uwk->name = $request->nama;
        $uwk->email = $request->email;
        $uwk->save();

        return redirect()->route('wk.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Wk::findOrFail($id);
        $item->delete();

        return redirect()->route('wk.index')->with('success', 'Data Berhasil Dihapus');
    }
}
