@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')
    @if (auth()->user()->role === 'admin')
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800" style="text-align: center; font-weight: bold">Dashboard Admin</h1>

            <img src="{{'gambar/yski.png'}}" alt="" style="width:500px; margin-right: auto; margin-left: auto; display: block; margin-top: 30px">

        </div>       
    @endif
    <!-- Begin Page Content -->
    @if (auth()->user()->role === 'guru')
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Data Pelanggar Terbanyak</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pelanggar Terbanyak</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover text-center" id="pelanggar">
                        <thead>
                        <tr>
                                <th class="text-center">No</th>
                                <th  class="text-center"scope="col">Nama</th>
                                <th  class="text-center"scope="col">Kelas</th>
                                <th  class="text-center"scope="col">Pelanggaran</th>
                        </tr>
                        </thead>
                        <tbody>
                            {{-- <td>{{$pelanggaran->siswa->nama}}</td> --}}
                            {{-- @foreach ($pel as $i)
                                @if ($i->pelanggaran()->where('siswa_id', $i->id)->exists())
                                    @if ($i->unit_id === auth()->user()->unit_id)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$i->nama}}</td>
                                            <td>{{$i->sub->sub}}</td>
                                            <td>{{$i->pelanggaran_count}}</td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    @endif
    @if (auth()->user()->role === 'gurubk')
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Data Pelanggar Terbanyak</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pelanggar Terbanyak</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover text-center" id="pelanggar">
                        <thead>
                        <tr>
                                <th class="text-center">No</th>
                                <th  class="text-center"scope="col">Nama</th>
                                <th  class="text-center"scope="col">Kelas</th>
                                <th  class="text-center"scope="col">Pelanggaran</th>
                        </tr>
                        </thead>
                        <tbody>
                            {{-- <td>{{$pelanggaran->siswa->nama}}</td> --}}
                            {{-- @foreach ($pel as $i)
                                @if ($i->pelanggaran()->where('siswa_id', $i->id)->exists())
                                    @if ($i->unit_id === auth()->user()->unit_id)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$i->nama}}</td>
                                            <td>{{$i->sub->sub}}</td>
                                            <td>{{$i->pelanggaran_count}}</td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    @endif
    <!-- /.container-fluid -->
    <!-- /.container-fluid -->
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
        var datatable = $('#pelanggar').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'number', name: 'number' },
                { data: 'nama', name: 'nama' },
                { data: 'sub_id', name: 'sub_id' },
                { data: 'pelanggaran', name: 'pelanggaran' },
            ]
        })
    </script>
    <script>
        $(document).ready(function () {
            $('#pelanggar').DataTable();
        });
    </script>
@endpush