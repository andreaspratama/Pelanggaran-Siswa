@extends('layouts.admin')

@section('title')
    Edit Data Pelanggaran {{$item->siswa->nama}}
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Data Pelanggaran {{$item->siswa->nama}}</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Pelanggaran {{$item->siswa->nama}}</h6>
            </div>
            <div class="card-body">
                <form action="{{route('pelanggaran.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="Kelas">Kelas</label>
                        <select class="form-control @error('kelas_id') is-invalid @enderror" id="kelas" name="kelas_id">
                          <option value="{{$item->kelas_id}}">{{$item->kelas->kelas}}</option>
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
                          <option value="{{$item->sub_id}}">{{$item->sub->sub}}</option>
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
                          <option value="{{$item->siswa_id}}">{{$item->siswa->nama}}</option>
                        </select>
                        @error('siswa_id')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="Wali Kelas">Wali Kelas</label>
                        <select class="form-control @error('wk_id') is-invalid @enderror" id="kelas" name="wk_id">
                          <option value="{{$item->wk_id}}">{{$item->wk->nama}}</option>
                          @foreach ($wk as $w)
                            <option value="{{$w->id}}">{{$w->nama}}</option>
                          @endforeach
                        </select>
                        @error('wk_id')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                        @enderror
                    </div> --}}
                    <div class="form-group">
                        <label for="Jenis Pelanggaran">Jenis Pelanggaran</label>
                        <select class="form-control @error('jnspelang_id') is-invalid @enderror" name="jnspelang_id">
                          <option value="{{$item->jnspelang_id}}">{{$item->jnspelang->jns}}</option>
                          @foreach ($jp as $j)
                            <option value="{{$j->id}}">{{$j->jns}}</option>
                          @endforeach
                        </select>
                        @error('jnspelang_id')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <textarea class="form-control" id="catatan" rows="3" name="catatan">{{$item->catatan}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="lanjutan">Tindak Lanjut</label>
                        <textarea class="form-control" id="lanjutan" rows="3" name="lanjutan">{{$item->lanjutan}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="bukti">Bukti</label>
                        <input type="file" class="form-control-file" id="bukti" name="bukti">
                        <img src="{{Storage::url($item->bukti)}}" alt="" class="img-thumbnail mt-2" width="20%">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Simpan</button>
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
                    url: '{{ route('getSubKelasPelang') }}?kelas_id='+kelasId,
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
                    url: '{{ route('getSiswaPelang') }}?sub_id='+subId,
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
