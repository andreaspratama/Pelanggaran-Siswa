<?php

namespace App\Exports;

use App\Models\Pelanggaran;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PelanggaranIdExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }

    public function map($data): array
    {
        if($data->siswa == null) {
            $rsiswa = "Siswa Terhapus";
        } else {
            $rsiswa = $data->siswa->nama;
        }

        if($data->kelas == null) {
            $rkelas = "Kelas Terhapus";
        } else {
            $rkelas = $data->kelas->kelas;
        }

        if($data->sub == null) {
            $rsub = "Sub Kelas Terhapus";
        } else {
            $rsub = $data->sub->sub;
        }

        if($data->wk == null) {
            $rwk = "Wali Kelas Terhapus";
        } else {
            $rwk = $data->wk->nama;
        }

        if($data->jnspelang == null) {
            $rjnspelang = "Jenis Pelanggaran Terhapus";
        } else {
            $rjnspelang = $data->jnspelang->jns;
        }

        return [
            $rsiswa,
            $rkelas,
            $rsub,
            $data->pelapor,
            $rwk,
            $rjnspelang,
            $data->catatan,
            $data->point,
            $data->bukti,
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
