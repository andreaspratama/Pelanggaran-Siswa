<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Unit;
use App\Models\Kelas;
use App\Models\Subkelas;
use App\Models\Pelanggaran;
use App\Imports\SiswaImport;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SiswaRequest;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Siswa::all();
        if(request()->ajax())
        {
            $query = Siswa::query();

            return Datatables::of($query)
                ->addColumn('aksi', function($item) {
                    return '
                        <a href="' . route('siswa.edit', $item->id) . '" class="btn btn-warning btn-sm">
                            Edit
                        </a>
                        <a href="' . route('ambilPelanggaran', $item->id) . '" class="btn btn-info btn-sm">
                            Pelanggaran
                        </a>
                        <form action="' . route('siswa.destroy', $item->id) . '" method="POST" class="d-inline">
                            ' . method_field('delete') . csrf_field() . '
                            <button type="submit" class="btn btn-danger btn-sm">
                                Delete
                            </button>
                        </form>
                    ';
                })
                ->editColumn('unit_id', function($item) {
                    return $item->unit->unit;
                })
                ->editColumn('kelas_id', function($item) {
                    return $item->kelas->kelas;
                })
                ->editColumn('sub_id', function($item) {
                    return $item->sub->sub;
                })
                ->addColumn('number', function($item) {
                    static $count = 0;
                    return ++$count;
                })
                ->rawColumns(['aksi', 'unit_id', 'kelas_id', 'sub_id', 'number'])
                ->make();
        }

        return view('pages.admin.siswa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Unit::all();

        return view('pages.admin.siswa.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiswaRequest $request)
    {
        // Insert ke table user
        $user = new User;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('siswa123**');
        $user->role = 'siswa';
        $user->save();

        // Insert ke table siswa
        $request->request->add(['user_id' => $user->id]);
        $siswa = $request->all();
        Siswa::create($siswa);
        
        return redirect()->route('siswa.index')->with('success', 'Data Berhasil Ditambah');
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
        $item = Siswa::findOrFail($id);
        $unit = Unit::all();

        return view('pages.admin.siswa.edit', compact('item', 'unit'));
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
        $data = Siswa::findOrFail($id);
        $update_siswa = $data->user_id;

        // Update data siswa
        $data->update($request->all());

        // Update data user
        $uBaru = User::findOrFail($update_siswa);
        $uBaru->name = $request->nama;
        $uBaru->email = $request->email;
        $uBaru->save();

        return redirect()->route('siswa.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Siswa::findOrFail($id);
        $item->delete();

        $hapusSiswa = $item->user_id;
        User::where('id', $hapusSiswa)->delete();

        return redirect()->route('siswa.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function getKelas(Request $request)
    {
        $kelas = Kelas::where('unit_id', $request->unit_id)->get();
        if (count($kelas) > 0) {
            return response()->json($kelas);
        }
    }

    public function getSubkelas(Request $request)
    {
        $sub = Subkelas::where('kelas_id', $request->kelas_id)->get();
        if (count($sub) > 0) {
            return response()->json($sub);
        }
    }

    public function point(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $items = Pelanggaran::with('siswa')
            ->where('siswa_id', $id)
            ->get();
        // $item = Pelanggaran::sum('point');
        
        return view('pages.admin.siswa.point', compact('siswa', 'items'));
    }

    public function importExcelSiswa(Request $request)
    {
        // Excel::import(new SiswaImport, $request->file('DataSiswa'));
        $file = $request->file('file');
        // dd($file);
        $namaFile = $file->getClientOriginalName();
        $file->move('DataSiswa', $namaFile);

        Excel::import(new SiswaImport, public_path('/DataSiswa/'.$namaFile));

        return redirect()->route('siswa.index')->with('success', 'Data Berhasil Ditambahkan');
    }
}
