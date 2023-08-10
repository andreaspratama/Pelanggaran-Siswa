<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggaran;
use App\Models\Siswa;
// use App\Models\Pelanggaran;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $query = Siswa::query()->withCount('pelanggaran')
                ->orderByDesc('pelanggaran_count')
                ->take(3)
                ->where('unit_id', auth()->user()->unit_id)
                ->get();
            // if ('pelanggaran' > 0) {
            //     withCount('pelanggaran')
            //     ->orderByDesc('pelanggaran_count')
            //     ->where('unit_id', auth()->user()->unit_id)
            //     ->get();
            // } else {
            //     'tidak';
            // }

            return Datatables::of($query)
                ->addColumn('number', function($item) {
                    static $count = 0;
                    return ++$count;
                })
                ->addColumn('pelanggaran', function($item) {
                    return $item->pelanggaran_count;
                })
                ->editColumn('sub_id', function($item) {
                    return $item->sub->sub;
                })
                ->rawColumns(['number', 'sub_id'])
                ->make();
        }

        // $pel = Siswa::withCount('pelanggaran')
        //     ->orderByDesc('pelanggaran_count')
        //     ->take(5)
        //     ->get();

        return view('pages.admin.dashboard');
    }
}
