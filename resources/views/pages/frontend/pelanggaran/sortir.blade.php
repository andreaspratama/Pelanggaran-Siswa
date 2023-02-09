@extends('layouts.admin')

@section('title')
    Sortir Pelanggaran Siswa
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Pelanggaran Berdasarkan Siswa</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pelanggaran Berdasarkan Siswa</h6>
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
                    <div class="form-group">
                        <label for="Siswa">Siswa</label>
                        <select class="form-control @error('siswa_id') is-invalid @enderror" id="siswa" name="siswa_id">
                          <option value="">Pilih Siswa</option>
                        </select>
                        @error('siswa_id')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                        @enderror
                    </div>
                    
                    <a href="" onclick="this.href='pelanggaranProses/'+ document.getElementById('siswa').value" class="btn btn-primary"><i class="fas fa-spinner mr-2"></i>Pilih Siswa</a>
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
                    url: '{{ route('getSubKelasPelangSortir') }}?kelas_id='+kelasId,
                    type: 'get',
                    success: function (res) {
                        $('#sub').html('<option value="">Pilih Sub Kelas</option>');
                        $.each(res, function (key, value) {
                            $('#sub').append('<option value="' + value
                                .id + '">' + value.sub + '</option>');
                        });
                        $('#siswa').html('<option value="">Pilih Siswa</option>');
                    }
                });
            });
            $('#sub').on('change', function () {
                var subId = this.value;
                $('#siswa').html('');
                $.ajax({
                    url: '{{ route('getSiswaPelangSortir') }}?sub_id='+subId,
                    type: 'get',
                    success: function (res) {
                        $('#siswa').html('<option value="">Pilih Siswa</option>');
                        $.each(res, function (key, value) {
                            $('#siswa').append('<option value="' + value
                                .id + '">' + value.nama + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endpush