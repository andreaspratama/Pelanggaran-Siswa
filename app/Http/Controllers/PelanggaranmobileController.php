<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Wk;
use App\Models\Thnakademik;
use App\Models\User;
use App\Models\Jnspelang;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Pelanggaran;

class PelanggaranmobileController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        $user = User::all();
        $wk = Wk::all();
        $jp = Jnspelang::all();
        $thn = Thnakademik::all();

        return view('pages.mobile.index', compact('kelas', 'user', 'wk', 'jp', 'thn'));
    }

    public function mobileStore(Request $request)
    {
        $data = $request->all();
        $data['thnakademik'] = request()->thnakademik;
        $data['tgl'] = Carbon::now();
        $data['pelapor'] = Auth::user()->name;
        $data['unit'] = Auth::user()->unit_id;
        $data['bukti'] = request()->file('bukti')->store('assets/bttd', 'public');

        Pelanggaran::create($data);

        // dd($data);
        return redirect()->route('mobile')->with('success', 'Data Berhasil Ditambah');
    }
}
