@extends('layouts.admin')

@section('title')
    Edit Data Jenis Pelanggaran
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Data Jenis Pelanggaran</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Jenis Pelanggaran</h6>
            </div>
            <div class="card-body">
                <form action="{{route('jnspelang.update', $item->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="jns">Jenis Pelanggaran</label>
                      <input type="text" class="form-control" name="jns" placeholder="Masukan Jenis Pelanggaran..." value="{{$item->jns}}">
                    </div>
                    <div class="form-group">
                        <label for="point">Jenis Pelanggaran</label>
                        <input type="text" class="form-control" name="point" placeholder="Masukan Point Pelanggaran..." value="{{$item->point}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('jnspelang.index')}}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection