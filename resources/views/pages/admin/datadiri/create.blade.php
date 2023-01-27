@extends('layouts.admin')

@section('title')
    Tambah Data DATA DIRI
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Data DATA DIRI</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data DATA DIRI</h6>
            </div>
            <div class="card-body">
                <form action="{{route('datadiriStore')}}" method="POST">
                    @csrf
                    <div class="after-more">
                        <div class="form-group">
                            <label for="nama">Nama DATA DIRI</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukan Nama Guru DATA DIRI..." value="{{old('nama')}}">
                            @error('nama')
                              <div class="invalid-feedback">
                                  {{$message}}
                              </div>
                            @enderror
                          </div>
                          <div class="form-group">
                              <label for="alamat">Alamat</label>
                              <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Masukan Alamat..." value="{{old('alamat')}}">
                              @error('alamat')
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
                            <label for="nama">Nama DATA DIRI</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukan Nama Guru DATA DIRI..." value="{{old('nama')}}">
                            @error('nama')
                              <div class="invalid-feedback">
                                  {{$message}}
                              </div>
                            @enderror
                          </div>
                          <div class="form-group">
                              <label for="alamat">Alamat</label>
                              <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Masukan Alamat..." value="{{old('alamat')}}">
                              @error('alamat')
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