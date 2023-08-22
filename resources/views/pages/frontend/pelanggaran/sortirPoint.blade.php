@extends('layouts.admin')

@section('title')
    Point Pelanggaran {{$siswa->nama}}
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Point Pelanggaran {{$siswa->nama}}</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Point Pelanggaran {{$siswa->nama}}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- @if ($item >= 20)
                        <div class="alert alert-danger" role="alert">
                            Point Melebihi Batas
                        </div>
                    @endif --}}
                    <table class="table table-bordered table-hover" id="crud" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pelanggaran</th>
                                <th>Pelapor</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $i)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$i->jnspelang->jns}}</td>
                                    <td>{{$i->pelapor}}</td>
                                    <td>
                                        <img src="{{Storage::url($i->bukti)}}" alt="" class="img-thumbnail" style="width: 200px">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{route('pelanggaranProsesKelas', $sb->id)}}" class="btn btn-secondary">Kembali</a>
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
            $('#crud').DataTable();
        });
    </script>
@endpush