@extends('layouts.admin')

@section('title')
    Tambah Data Sub Kelas
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Data Sub Kelas</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Sub Kelas</h6>
            </div>
            <div class="card-body">
                <form action="{{route('subkelas.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="sub">Sub Kelas</label>
                      <input type="text" class="form-control @error('sub') is-invalid @enderror" name="sub" placeholder="Masukan Sub Kelas..." value="{{old('sub')}}">
                      @error('sub')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="kelas_id">Kelas</label>
                        <select class="form-control @error('kelas_id') is-invalid @enderror" name="kelas_id">
                          <option>-- Pilih Kelas --</option>
                          @foreach ($kelas as $k)
                            <option value="{{$k->id}}">{{$k->kelas}}</option>
                          @endforeach
                        </select>
                        @error('kelas')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('subkelas.index')}}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection