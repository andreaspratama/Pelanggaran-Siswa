@extends('layouts.admin')

@section('title')
    Tambah Data Kelas
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Data Kelas</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Kelas</h6>
            </div>
            <div class="card-body">
                <form action="{{route('kelas.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="kelas">Kelas</label>
                      <input type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" placeholder="Masukan Kelas..." value="{{old('kelas')}}">
                      @error('kelas')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="unit_id">Unit</label>
                        <select class="form-control @error('unit_id') is-invalid @enderror" name="unit_id">
                          <option>-- Pilih Unit --</option>
                          @foreach ($unit as $u)
                            <option value="{{$u->id}}">{{$u->unit}}</option>
                          @endforeach
                        </select>
                        @error('unit')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('kelas.index')}}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection