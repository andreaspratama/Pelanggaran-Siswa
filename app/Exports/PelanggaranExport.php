<?php

namespace App\Exports;

use App\Models\Pelanggaran;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PelanggaranExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pelanggaran::all();
    }

    public function map($pelanggaran): array
    {
        if($pelanggaran->siswa == null) {
            $rsiswa = "Siswa Terhapus";
        } else {
            $rsiswa = $pelanggaran->siswa->nama;
        }

        if($pelanggaran->kelas == null) {
            $rkelas = "Kelas Terhapus";
        } else {
            $rkelas = $pelanggaran->kelas->kelas;
        }

        if($pelanggaran->sub == null) {
            $rsub = "Sub Kelas Terhapus";
        } else {
            $rsub = $pelanggaran->sub->sub;
        }

        if($pelanggaran->wk == null) {
            $rwk = "Wali Kelas Terhapus";
        } else {
            $rwk = $pelanggaran->wk->nama;
        }

        if($pelanggaran->jnspelang == null) {
            $rjnspelang = "Jenis Pelanggaran Terhapus";
        } else {
            $rjnspelang = $pelanggaran->jnspelang->jns;
        }

        return [
            $rsiswa,
            $rkelas,
            $rsub,
            $pelanggaran->pelapor,
            $rwk,
            $rjnspelang,
            $pelanggaran->catatan,
            $pelanggaran->point,
            $pelanggaran->bukti,
        ];
    }

    public function headings(): array
    {
        return [
            'Siswa',
            'Kelas',
            'Sub Kelas',
            'Pelapor',
            'Wali Kelas',
            'Jenis Pelanggaran',
            'Catatan',
            'Point',
            'Bukti',
        ];
    }
}
