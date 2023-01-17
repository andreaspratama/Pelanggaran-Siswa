@extends('layouts.admin')

@section('title')
    Detail Pelanggaran {{$item->siswa->nama}}
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Pelanggaran Siswa {{$item->siswa->nama}}</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pelanggaran Siswa</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Nama</th>
                        <td>{{$item->siswa->nama}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Kelas</th>
                        <td>{{$item->kelas->kelas}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Sub Kelas</th>
                        <td>{{$item->sub->sub}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Pelapor</th>
                        <td>{{$item->pelapor}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Wali Kelas</th>
                        <td>{{$item->wk->nama}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Jenis Pelanggaran</th>
                        <td>{{$item->jnspelang->jns}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Catatan</th>
                        <td>{{$item->catatan}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Point</th>
                        <td>{{$item->point}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Bukti</th>
                        <td>
                            <img src="{{Storage::url($item->bukti)}}" alt="" class="img-thumbnail" width="30%">
                        </td>
                    </tr>
                </table>
                <a href="{{route('pelanggaran.index')}}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection