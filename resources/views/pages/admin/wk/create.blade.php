@extends('layouts.admin')

@section('title')
    Tambah Data Wali Kelas
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Data Wali Kelas</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Wali Kelas</h6>
            </div>
            <div class="card-body">
                <form action="{{route('wk.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="nama">Nama Wali Kelas</label>
                      <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukan Nama Wali Kelas..." value="{{old('nama')}}">
                      @error('nama')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Masukan Email..." value="{{old('email')}}">
                        @error('email')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="ttd">Masukan Tanda Tangan</label>
                        <input type="file" class="form-control-file @error('ttd') is-invalid @enderror" name="ttd">
                        @error('ttd')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('wk.index')}}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection