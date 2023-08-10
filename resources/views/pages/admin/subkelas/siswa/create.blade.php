@extends('layouts.admin')

@section('title')
    Tambah Data Siswa
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Data Siswa</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Siswa</h6>
            </div>
            <div class="card-body">
                <form action="{{route('siswa.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="nama">Nama Siswa</label>
                      <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukan Nama Siswa..." value="{{old('nama')}}">
                      @error('nama')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Masukan Nama Siswa..." value="{{old('email')}}">
                        @error('email')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" placeholder="Masukan NISN..." value="{{old('nisn')}}">
                        @error('nisn')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Unit">Unit</label>
                        <select class="form-control unit @error('unit_id') is-invalid @enderror" id="unit" name="unit_id">
                          <option>Pilih Unit</option>
                          @foreach ($data as $u)
                            <option value="{{$u->id}}">{{$u->unit}}</option>
                          @endforeach
                        </select>
                        @error('unit_id')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Kelas">Kelas</label>
                        <select class="form-control @error('kelas_id') is-invalid @enderror" id="kelas" name="kelas_id">
                          <option value="">Pilih Kelas</option>
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
                          <option value="">Pilih Subkelas</option>
                        </select>
                        @error('sub_id')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('siswa.index')}}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

@push('addon-script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#unit').on('change', function () {
                var unitId = this.value;
                $('#kelas').html('');
                $.ajax({
                    url: '{{ route('getKelas') }}?unit_id='+unitId,
                    type: 'get',
                    success: function (res) {
                        $('#kelas').html('<option value="">Pilih Kelas</option>');
                        $.each(res, function (key, value) {
                            $('#kelas').append('<option value="' + value
                                .id + '">' + value.kelas + '</option>');
                        });
                        $('#sub').html('<option value="">Select Sub Kelas</option>');
                    }
                });
            });
            $('#kelas').on('change', function () {
                var kelasId = this.value;
                $('#sub').html('');
                $.ajax({
                    url: '{{ route('getSubkelas') }}?kelas_id='+kelasId,
                    type: 'get',
                    success: function (res) {
                        $('#sub').html('<option value="">Pilih Sub Kelas</option>');
                        $.each(res, function (key, value) {
                            $('#sub').append('<option value="' + value
                                .id + '">' + value.sub + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endpush