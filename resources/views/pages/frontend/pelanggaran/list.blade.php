{{-- @extends('layouts.admin')

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
                <a href="{{route('pelanggaranExportExcel')}}" class="btn btn-success btn-sm mt-2">Cetak Excel</a>
                <a href="{{route('pelanggaranExportPdf')}}" class="btn btn-danger btn-sm mt-2">Cetak PDF</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="pelang" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Tanggal</th>
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
        var datatable = $('#pelang').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'number', name: 'number' },
                { data: 'siswa_id', name: 'siswa_id' },
                { data: 'kelas_id', name: 'kelas_id' },
                { data: 'tgl', name: 'tgl' },
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
            $('#crudPelanggaran').DataTable();
        });
    </script>
@endpush --}}

@extends('layouts.admin')

@section('title')
    Sortir Pelanggaran Kelas
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Pelanggaran Berdasarkan Kelas</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pelanggaran Berdasarkan Kelas</h6>
            </div>
            <div class="card-body">
                <form action="{{route('pelanggaran.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="Kelas">Kelas</label>
                        <select class="form-control @error('kelas_id') is-invalid @enderror" id="kelas" name="kelas_id">
                          <option>Pilih Kelas</option>
                          @foreach ($kelas as $k)
                            @if (auth()->user()->unit_id === $k->unit_id)
                                <option value="{{$k->id}}">{{$k->kelas}}</option>
                            @endif
                          @endforeach
                        </select>
                        @error('kelas_id')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Subkelas">Sub Kelas</label>
                        <select class="form-control @error('sub_id') is-invalid @enderror" id="sub" name="sub_id">
                          <option value="">Pilih Sub Kelas</option>
                        </select>
                        @error('sub_id')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                        @enderror
                    </div>
                    
                    <a href="" onclick="this.href='pelanggaranProsesKelas/'+ document.getElementById('sub').value" class="btn btn-primary"><i class="fas fa-spinner mr-2"></i>Pilih Kelas</a>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    @include('sweetalert::alert')
@endsection

@push('addon-script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#kelas').on('change', function () {
                var kelasId = this.value;
                $('#sub').html('');
                $.ajax({
                    url: '{{ route('getSubKelasSortir') }}?kelas_id='+kelasId,
                    type: 'get',
                    success: function (res) {
                        $('#sub').html('<option value="">Pilih Sub Kelas</option>');
                        $.each(res, function (key, value) {
                            $('#sub').append('<option value="' + value
                                .id + '">' + value.sub + '</option>');
                        });
                        // $('#siswa').html('<option value="">Pilih Siswa</option>');
                    }
                });
            });
            // $('#sub').on('change', function () {
            //     var subId = this.value;
            //     $('#siswa').html('');
            //     $.ajax({
            //         url: '{{ route('getSiswaPelangSortir') }}?sub_id='+subId,
            //         type: 'get',
            //         success: function (res) {
            //             $('#siswa').html('<option value="">Pilih Siswa</option>');
            //             $.each(res, function (key, value) {
            //                 $('#siswa').append('<option value="' + value
            //                     .id + '">' + value.nama + '</option>');
            //             });
            //         }
            //     });
            // });
        });
    </script>
@endpush