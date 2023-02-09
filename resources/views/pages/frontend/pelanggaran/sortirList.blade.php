@extends('layouts.admin')

@section('title')
    Data Pelanggaran Siswa
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
                <a href="{{route('pelanggaranExportExcelId', $cid->id)}}" class="btn btn-success btn-sm mt-2">Cetak Excel</a>
                <a href="{{route('cetakPdfSiswaId', $cid->id)}}" class="btn btn-danger btn-sm mt-2">Cetak PDF</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if ($hp > 25)
                        <div class="alert alert-danger" role="alert">
                            Point Melebihi Batas
                        </div>
                    @endif
                    <table class="table table-bordered table-hover" id="crudPelanggaran" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Pelapor</th>
                                <th>Catatan</th>
                                <th>Point</th>
                                <th>Bukti</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($psiswa as $ps)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$ps->siswa->nama}}</td>
                                    <td>{{$ps->kelas->kelas}}</td>
                                    <td>{{$ps->pelapor}}</td>
                                    <td>{{$ps->catatan}}</td>
                                    <td>{{$ps->point}}</td>
                                    <td>
                                        <img src="{{Storage::url($ps->bukti)}}" alt="" class="img-thumbnail" style="width: 200px">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{route('pelanggaranSortir')}}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    @include('sweetalert::alert')
@endsection