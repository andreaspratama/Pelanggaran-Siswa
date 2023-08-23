<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <div class="card mb-5 mt-5">
            <div class="card-header">
              Form Pelanggaran
            </div>
            <div class="card-body">
                <form action="{{route('mobileStore')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="thnakademik_id">Tahun Akademik</label>
                        @foreach ($thn as $i)
                            @if ($i->status === 'Aktif')
                                <select class="form-control" id="exampleFormControlSelect1" name="thnakademik">
                                    <option value="{{$i->thn}} / {{$i->sem}}">{{$i->thn}} / {{$i->sem}}</option>
                                </select>
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="Kelas">Kelas</label>
                        <select class="form-control @error('kelas_id') is-invalid @enderror" id="kelas" name="kelas_id">
                          <option>Pilih Kelas</option>
                          @foreach ($kelas as $k)
                            {{-- <option value="{{$k->id}}">{{$k->kelas}}</option> --}}
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
                    <div class="form-group">
                        <label for="Jenis Pelanggaran">Jenis Pelanggaran</label>
                        <select class="form-control @error('jnspelang_id') is-invalid @enderror" id="kelas" name="jnspelang_id">
                          <option>Pilih Jenis Pelanggaran</option>
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
                        <label for="catatan">Peristiwa</label>
                        <textarea class="form-control" id="catatan" rows="3" name="catatan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="lanjutan">Tindak Lanjut</label>
                        <textarea class="form-control" id="lanjutan" rows="3" name="lanjutan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control-file" id="foto" name="bukti">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('dashboard')}}" class="btn btn-secondary">Dashboard</a>
                </form>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
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

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>