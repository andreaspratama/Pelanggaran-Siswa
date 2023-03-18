@extends('layouts.admin')

@section('title')
    Edit Data Guru
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Data Guru</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Guru</h6>
            </div>
            <div class="card-body">
                <form action="{{route('guru.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="text" name="oldImage" value="{{$item->ttd}}">
                    <div class="form-group">
                      <label for="nama">Nama Guru</label>
                      <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Wali Kelas..." value="{{$item->nama}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Masukan Email..." value="{{$item->email}}">
                    </div>
                    <div class="form-group">
                        <label for="Unit">Unit</label>
                        <select class="form-control @error('unit_id') is-invalid @enderror" id="unit" name="unit_id">
                          <option value="{{$item->unit_id}}">{{$item->unit->unit}}</option>
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