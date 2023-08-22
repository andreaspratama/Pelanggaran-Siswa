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
                {{-- <a href="{{route('pelanggaranExportExcelId', $cid->id)}}" class="btn btn-success btn-sm mt-2">Cetak Excel</a>
                <a href="{{route('cetakPdfSiswaId', $cid->id)}}" class="btn btn-danger btn-sm mt-2">Cetak PDF</a> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- @if ($hp > 25)
                        <div class="alert alert-danger" role="alert">
                            Point Melebihi Batas
                        </div>
                    @endif --}}
                    <table class="table table-bordered table-hover" id="crudPelanggaran" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ksiswa as $ks)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$ks->nama}}</td>
                                    <td>{{$ks->sub->sub}}</td>
                                    <td>
                                        <a href="/siswa/{{$ks->id}}/{{$pk->id}}/sortir" class="btn btn-info btn-sm">
                                            Pelanggaran
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{route('pelanggaran.index')}}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    @include('sweetalert::alert')
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
@endpush

@push('addon-script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#crudPelanggaran').DataTable();
        });
    </script>
@endpush