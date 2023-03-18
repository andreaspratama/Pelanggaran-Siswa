@extends('layouts.admin')

@section('title')
    Tambah Data Tahun Akademik
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Data Tahun Akademik</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Tahun Akademik</h6>
            </div>
            <div class="card-body">
                <form action="{{route('thnakademik.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="thn">Tahun Akademik</label>
                      <input type="text" class="form-control @error('thn') is-invalid @enderror" name="thn" placeholder="Masukan Tahun Akademik..." value="{{old('thn')}}">
                      @error('thn')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="sem">Semester</label>
                        <select class="form-control" id="sem" name="sem">
                          <option>-- Pilih Semester --</option>
                          <option>Ganjil</option>
                          <option>Genap</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                          <option>-- Pilih Status --</option>
                          <option>Aktif</option>
                          <option>Tidak Aktif</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('thnakademik.index')}}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection