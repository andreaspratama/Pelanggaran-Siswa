@extends('layouts.admin')

@section('title')
    Edit Data Wali Kelas
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Data Wali Kelas</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Wali Kelas</h6>
            </div>
            <div class="card-body">
                <form action="{{route('wk.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="nama">Nama Wali Kelas</label>
                      <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Wali Kelas..." value="{{$item->nama}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Masukan Email..." value="{{$item->email}}">
                    </div>
                    <div class="form-group">
                        <label for="ttd">Masukan Tanda Tangan</label>
                        <input type="file" class="form-control-file" name="ttd">
                    </div>
                    <div class="form-group">
                        <img src="{{asset("storage/" . $item->ttd)}}" alt="" width="15%" class="img-thumbnail">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('wk.index')}}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection