<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Kelas;

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

    public function getKelas(Request $request)
    {
        $kelas = Kelas::where('unit_id', $request->unit_id)->get();
        if (count($kelas) > 0) {
            return response()->json($kelas);
        }
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
        $kelas = Kelas::where('unit_id', $request->get('id'))
            ->pluck('unit', 'id');
    
        return response()->json($kelas);
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
