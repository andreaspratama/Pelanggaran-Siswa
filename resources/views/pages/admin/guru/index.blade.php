@extends('layouts.admin')

@section('title')
    Data Guru
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Guru</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Guru</h6>
                <a href="{{route('guru.create')}}" class="btn btn-primary btn-sm mt-2">Tambah Data</a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success btn-sm mt-2" data-toggle="modal" data-target="#exampleModal">
                    Import Data
                </button>
                <!-- Modal -->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="crud" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Unit</th>
                                <th>Tanda Tangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $i)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$i->nama}}</td>
                                    <td>{{$i->email}}</td>
                                    <td>{{$i->unit->unit}}</td>
                                    <td>
                                        <img src="{{Storage::url($i->ttd)}}" alt="" style="width: 150px" class="img-thumbnail">
                                    </td>
                                    <td>
                                        <a href="{{route('guru.edit', $i->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{route('guru.destroy', $i->id)}}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    @include('sweetalert::alert')
@endsection
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('importExcelGuru')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                <label for="file">Pilih File</label>
                <input type="file" class="form-control-file" id="file" name="file">
                </div>
                <button class="btn btn-primary float-right" type="submit">Import</button>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>

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
            $('#crud').DataTable();
        });
    </script>
@endpush