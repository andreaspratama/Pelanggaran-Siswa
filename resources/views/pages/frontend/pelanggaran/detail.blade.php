@extends('layouts.admin')

@section('title')
    Detail Pelanggaran
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Pelanggaran Siswa</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pelanggaran Siswa</h6>
                <a href="{{route('cetakPdfSiswaId', $item->siswa->id)}}" class="btn btn-danger btn-sm mt-3">
                    Cetak PDF
                </a>
                <a href="{{route('pelanggaranExportExcelId', $item->siswa->id)}}" class="btn btn-success btn-sm mt-3">
                    Cetak Excel
                </a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                            <th>No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Pelapor</th>
                            <th scope="col">Wali Kelas</th>
                            <th scope="col">Jenis Pelanggaran</th>
                            <th scope="col">Catatan</th>
                            <th scope="col">Point</th>
                            <th scope="col">Bukti</th>
                      </tr>
                    </thead>
                    <tbody>
                        {{-- <td>{{$pelanggaran->siswa->nama}}</td> --}}
                        @foreach ($items as $i)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$i->siswa->nama}}</td>
                                <td>{{$i->sub->sub}}</td>
                                <td>{{$i->pelapor}}</td>
                                <td>{{$i->wk->nama}}</td>
                                <td>{{$i->jnspelang->jns}}</td>
                                <td>{{$i->catatan}}</td>
                                <td>{{$i->point}}</td>
                                <td>
                                    <img src="{{Storage::url($i->bukti)}}" alt="" class="img-thumbnail" style="width: 150px;">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{route('pelanggaran.index')}}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection