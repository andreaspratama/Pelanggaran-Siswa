@extends('layouts.admin')

@section('title')
    Tambah Data Jenis Pelanggaran
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Data Jenis Pelanggaran</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Jenis Pelanggaran</h6>
            </div>
            <div class="card-body">
                <form action="{{route('jnspelang.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="jns">Jenis Pelanggaran</label>
                      <input type="text" class="form-control @error('jns') is-invalid @enderror" name="jns" placeholder="Masukan Jenis Pelanggaran..." value="{{old('jns')}}">
                      @error('jns')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="point">Point Pelanggaran</label>
                        <input type="text" class="form-control @error('point') is-invalid @enderror" name="point" placeholder="Masukan Point Pelanggaran..." value="{{old('point')}}">
                        @error('point')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('jnspelang.index')}}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection