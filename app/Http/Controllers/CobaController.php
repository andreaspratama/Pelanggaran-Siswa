<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Kelas;
use App\Models\Subkelas;
use App\Models\Coba;

class CobaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Unit::all();

        return view('pages.admin.coba', compact('data'));
    }

    // public function getKelas(Request $request)
    // {
    //     $kelas = Kelas::where('unit_id', $request->unit_id)->get();
    //     if (count($kelas) > 0) {
    //         return response()->json($kelas);
    //     }
    // }

    // public function getSubkelas(Request $request)
    // {
    //     $sub = Subkelas::where('kelas_id', $request->kelas_id)->get();
    //     if (count($sub) > 0) {
    //         return response()->json($sub);
    //     }
    // }

    public function liat()
    {
        $data = Coba::all();

        return view('pages.admin.cobaliat', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function pilihUnit(Request $request)
    // {
    //     $data = Unit::where('unit', 'LIKE', '%'.request('q').'%')->paginate(10);

    //     return response()->json();
    // }

    // public function kelas($id)
    // {
    //     $data = Kelas::where('unit_id', $id)->where('unit', 'LIKE', '%'.request('q').'%')->paginate(10);

    //     return response()->json();
    // }

    public function create()
    {
        //
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
        // dd($data);
        Coba::create($data);

        return redirect()->route('coba.index');
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
