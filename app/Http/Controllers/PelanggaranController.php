<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggaran;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Subkelas;
use App\Models\Wk;
use App\Models\Thnakademik;
use App\Models\User;
use App\Models\Jnspelang;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Exports\PelanggaranExport;
use App\Exports\PelanggaranIdExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use PDF;

class PelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(request()->ajax())
        // {
        //     $query = Pelanggaran::query()->where('unit', auth()->user()->unit_id);

        //     return Datatables::of($query)
        //         ->addColumn('aksi', function($item) {
        //             return '
        //                 <a href="' . route('pelanggaran.edit', $item->id) . '" class="btn btn-warning btn-sm">
        //                     Edit
        //                 </a>
        //                 <a href="' . route('pelanggaran.show', $item->siswa->id) . '" class="btn btn-info btn-sm">
        //                     Detail
        //                 </a>
        //                 <form action="' . route('pelanggaran.destroy', $item->id) . '" method="POST" class="d-inline">
        //                     ' . method_field('delete') . csrf_field() . '
        //                     <button type="submit" class="btn btn-danger btn-sm">
        //                         Delete
        //                     </button>
        //                 </form>
        //             ';
        //         })
        //         ->editColumn('kelas_id', function($item) {
        //             return $item->kelas->kelas;
        //         })
        //         ->editColumn('siswa_id', function($item) {
        //             return $item->siswa->nama;
        //         })
        //         ->addColumn('number', function($item) {
        //             static $count = 0;
        //             return ++$count;
        //         })
        //         ->rawColumns(['aksi', 'unit_id', 'kelas_id', 'siswa_id', 'number'])
        //         ->make();
        // }
        $kelas = Kelas::all();

        return view('pages.frontend.pelanggaran.list', compact('kelas'));
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
        $thn = Thnakademik::all();

        return view('pages.frontend.pelanggaran.index', compact('kelas', 'user', 'wk', 'jp', 'thn'));
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
        $data['thnakademik'] = request()->thnakademik;
        $data['tgl'] = Carbon::now();
        $data['pelapor'] = Auth::user()->name;
        $data['unit'] = Auth::user()->unit_id;
        $data['bukti'] = request()->file('bukti')->store('assets/bttd', 'public');

        Pelanggaran::create($data);

        // dd($data);
        return redirect()->route('pelanggaran.create')->with('success', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $item = Pelanggaran::findOrFail($id);
        $item = Pelanggaran::where('siswa_id', $id)->first();
        $items = Pelanggaran::where('siswa_id', $id)->get();

        return view('pages.frontend.pelanggaran.detail', compact('items', 'item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Pelanggaran::findOrFail($id);
        $kelas = Kelas::all();
        $wk = Wk::all();
        $jp = Jnspelang::all();

        return view('pages.frontend.pelanggaran.edit', compact('item', 'kelas', 'wk', 'jp'));
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
        if ($request->jnspelang_id == 1) {
            $jns = 10;
        } else {
            $jns = 5;
        }

        $item = Pelanggaran::findOrFail($id);
        $up = ('public/'.$item->bukti);

        if(request('bukti')) {
            Storage::disk('local')->delete($up);
            $image = request()->file('bukti')->store('assets/bttd', 'public');
        } elseif($item->bukti) {
            $image = $item->bukti;
        } else {
            $image = null;
        }

        $item->siswa_id = $request->siswa_id;
        $item->kelas_id = $request->kelas_id;
        $item->sub_id = $request->sub_id;
        $item->pelapor = Auth::user()->name;
        $item->lanjutan = $request->lanjutan;
        $item->jnspelang_id = $request->jnspelang_id;
        $item->catatan = $request->catatan;
        // $item->point = $jns;
        $item->bukti = $image;
        $item->tgl = Carbon::now();
        $item->save();

        return redirect()->route('pelanggaran.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Pelanggaran::findOrFail($id);
        $item->delete();

        return redirect()->route('pelanggaran.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function exportExcel()
    {
        return Excel::download(new PelanggaranExport, 'pelanggaran.xlsx');
    }

    public function exportExcelId($id)
    {
        $data = Pelanggaran::where('siswa_id', '=', $id)->get();

        return Excel::download(new PelanggaranIdExport($data), 'pelanggaranid.xlsx');
    }

    public function exportPdf()
    {   
        $pelanggaran = Pelanggaran::all();
        $pdf = PDF::loadView('pages.frontend.pelanggaran.template', compact('pelanggaran'))->setPaper('a4', 'landscape');

        return $pdf->stream();
    }

    public function cetakPdfSiswaId($id)
    {   
        $pelanggaran = Pelanggaran::where('siswa_id', $id)->get();
        $pdf = PDF::loadView('pages.frontend.pelanggaran.templateId', compact('pelanggaran'))->setPaper('a4', 'landscape');

        return $pdf->stream();
    }


    // Sortir Per Siswa

    public function pelanggaranSortir()
    {
        $kelas = Kelas::all();

        return view('pages.frontend.pelanggaran.sortir', compact('kelas'));
    }

    public function getSubKelasPelangSortir(Request $request)
    {
        $sub = Subkelas::where('kelas_id', $request->kelas_id)->get();
        if (count($sub) > 0) {
            return response()->json($sub);
        }
    }

    public function getSiswaPelangSortir(Request $request)
    {
        $siswa = Siswa::where('sub_id', $request->sub_id)->get();
        if (count($siswa) > 0) {
            return response()->json($siswa);
        }
    }

    public function proses($siswa)
    {
        $cid = Siswa::findOrFail($siswa);
        $psiswa = Pelanggaran::where('siswa_id', $siswa)->get();
        $hp = $psiswa->sum('point');
        // dd($ps);
        return view('pages.frontend.pelanggaran.sortirList', compact('psiswa', 'cid', 'hp'));
    }

    // Sortir Per Kelas

    public function getSubKelasSortir(Request $request)
    {
        $sub = Subkelas::where('kelas_id', $request->kelas_id)->get();
        if (count($sub) > 0) {
            return response()->json($sub);
        }
    }

    public function prosesKelas($sub)
    {
        $pk = Subkelas::findOrFail($sub);
        $ksiswa = Siswa::where('sub_id', $sub)->get();
        // $hp = $psiswa->sum('point');
        // dd($ps);
        return view('pages.frontend.pelanggaran.sortirListKelas', compact('pk', 'ksiswa'));
    }

    public function sortir(Request $request, $id, $sub)
    {
        $siswa = Siswa::findOrFail($id);
        $items = Pelanggaran::with('siswa')
            ->where('siswa_id', $id)
            ->get();
        // $item = Pelanggaran::sum('point');
        $sb = Subkelas::findOrFail($sub);
        
        return view('pages.frontend.pelanggaran.sortirPoint', compact('siswa', 'items', 'sb'));
    }
}
