@extends('layouts.admin')

@section('title')
    Tambah Data Keluarga
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Data Keluarga</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Keluarga</h6>
            </div>
            <div class="card-body">
                <form action="{{route('datadiriStore')}}" method="POST">
                    @csrf
                    <div class="after-more">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="datadiri_id">Induk</label>
                                <select class="form-control" id="datadiri_id" name="datadiri_id">
                                  <option></option>
                                  @foreach ($dd as $d)
                                    <option value="{{$d->id}}">{{$d->nama}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="namaIs">Nama</label>
                            <input type="text" class="form-control @error('namaIs') is-invalid @enderror" name="namaIs" placeholder="Masukan Nama Guru DATA DIRI..." value="{{old('namaIs')}}">
                            @error('namaIs')
                              <div class="invalid-feedback">
                                  {{$message}}
                              </div>
                            @enderror
                          </div>
                          <div class="form-group">
                              <label for="alamatIs">Alamat</label>
                              <input type="text" class="form-control @error('alamatIs') is-invalid @enderror" name="alamatIs" placeholder="Masukan Alamat..." value="{{old('alamatIs')}}">
                              @error('alamatIs')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                              @enderror
                          </div>
                    </div>
                    <div class="tombolAksi mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('gb.index')}}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
                <button class="btn btn-success add mt-3">Tambah Form</button>
                <div class="copy invisible mt-3">
                      <div class="control-group mt-3">
                        <div class="form-group">
                            <label for="namaIs">Nama</label>
                            <input type="text" class="form-control @error('namaIs') is-invalid @enderror" name="namaIs" placeholder="Masukan Nama Guru DATA DIRI..." value="{{old('namaIs')}}">
                            @error('namaIs')
                              <div class="invalid-feedback">
                                  {{$message}}
                              </div>
                            @enderror
                          </div>
                          <div class="form-group">
                              <label for="alamatIs">Alamat</label>
                              <input type="text" class="form-control @error('alamatIs') is-invalid @enderror" name="alamatIs" placeholder="Masukan Alamat..." value="{{old('alamatIs')}}">
                              @error('alamatIs')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                              @enderror
                          </div>
                          <button class="btn btn-danger remove">Hapus</button>
                      </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

@push('addon-script')
    <script type="text/javascript">
        $(document).ready(function() {
        $(".add").click(function(){ 
            var html = $(".copy").html();
            $(".after-more").after(html);
        });

        // saat tombol remove dklik control group akan dihapus 
        $("body").on("click",".remove",function(){ 
            $(this).parents(".control-group").remove();
        });
        });
    </script>
@endpush