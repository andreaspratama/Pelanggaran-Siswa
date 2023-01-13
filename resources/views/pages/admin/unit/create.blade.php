@extends('layouts.admin')

@section('title')
    Tambah Data Unit
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Data Unit</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Unit</h6>
            </div>
            <div class="card-body">
                <form action="{{route('unit.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="unit">Unit</label>
                      <input type="text" class="form-control @error('unit') is-invalid @enderror" name="unit" placeholder="Masukan Unit..." value="{{old('unit')}}">
                      @error('unit')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('unit.index')}}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection