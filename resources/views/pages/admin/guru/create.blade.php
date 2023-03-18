@extends('layouts.admin')

@section('title')
    Tambah Data Guru
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Data Guru</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Guru</h6>
            </div>
            <div class="card-body">
                <form action="{{route('guru.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="nama">Nama Guru</label>
                      <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukan Nama Guru..." value="{{old('nama')}}">
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
                        <label for="Unit">Unit</label>
                        <select class="form-control @error('unit_id') is-invalid @enderror" id="unit" name="unit_id">
                          <option>Pilih Unit...</option>
                          @foreach ($unit as $u)
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