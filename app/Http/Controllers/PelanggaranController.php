<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggaran;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Subkelas;
use App\Models\Wk;
use App\Models\User;
use App\Models\Jnspelang;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = Pelanggaran::query();

            return Datatables::of($query)
                ->addColumn('aksi', function($item) {
                    return '
                        <a href="' . route('pelanggaran.edit', $item->id) . '" class="btn btn-warning btn-sm">
                            Edit
                        </a>
                        <a href="' . route('pelanggaran.show', $item->id) . '" class="btn btn-info btn-sm">
                            Detail
                        </a>
                        <form action="' . route('pelanggaran.destroy', $item->id) . '" method="POST" class="d-inline">
                            ' . method_field('delete') . csrf_field() . '
                            <button type="submit" class="btn btn-danger btn-sm">
                                Delete
                            </button>
                        </form>
                    ';
                })
                ->editColumn('kelas_id', function($item) {
                    return $item->kelas->kelas;
                })
                ->editColumn('siswa_id', function($item) {
                    return $item->siswa->nama;
                })
                ->rawColumns(['aksi', 'unit_id', 'kelas_id', 'siswa_id'])
                ->make();
        }

        return view('pages.frontend.pelanggaran.list');
    }

    public function getSubKelasPelang(Request $request)
    {
        $sub = Subkelas::where('kelas_id', $request->kelas_id)->get();
        if (count($sub) > 0) {
            return response()->json($sub);
        }
    }

    public function getSiswaPelang(Request $request)
    {
        $siswa = Siswa::where('sub_id', $request->sub_id)->get();
        if (count($siswa) > 0) {
            return response()->json($siswa);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        $user = User::all();
        $wk = Wk::all();
        $jp = Jnspelang::all();

        return view('pages.frontend.pelanggaran.index', compact('kelas', 'user', 'wk', 'jp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->jnspelang_id == 1) {
            $jns = 10;
        } else {
            $jns = 5;
        }
        

        $data = $request->all();
        $data['point'] = $jns;
        $data['pelapor'] = Auth::user()->name;
        $data['bukti'] = request()->file('bukti')->store('assets/bttd', 'public');

        Pelanggaran::create($data);

        // dd($data);
        return redirect()->route('pelanggaran.index')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Pelanggaran::findOrFail($id);

        return view('pages.frontend.pelanggaran.detail', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
