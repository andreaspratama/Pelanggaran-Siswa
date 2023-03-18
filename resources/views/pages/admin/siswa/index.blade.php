@extends('layouts.admin')

@section('title')
    Data Siswa
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Siswa</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
                <a href="{{route('siswa.create')}}" class="btn btn-primary btn-sm mt-2">Tambah Data</a>
                <button type="button" class="btn btn-success btn-sm mt-2" data-toggle="modal" data-target="#exampleModal">
                    Import Excel
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="crudSiswa" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nisn</th>
                                <th>Unit</th>
                                <th>Kelas</th>
                                <th>Sub Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
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
        var datatable = $('#crudSiswa').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'number', name: 'number' },
                { data: 'nama', name: 'nama' },
                { data: 'nisn', name: 'nisn' },
                { data: 'unit_id', name: 'unit_id' },
                { data: 'kelas_id', name: 'kelas_id' },
                { data: 'sub_id', name: 'sub_id' },
                {
                    data: 'aksi',
                    name: 'aksi',
                    orderable: false,
                    searcable: false,
                    width: '25%'
                },
            ]
        })
    </script>
    <script>
        $(document).ready(function () {
            $('#crudSiswa').DataTable();
        });
    </script>
@endpush