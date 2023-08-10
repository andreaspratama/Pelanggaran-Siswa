@extends('layouts.admin')

@section('title')
    Edit Data Tahun Akademik
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Data Tahun Akademik</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Tahun Akademik</h6>
            </div>
            <div class="card-body">
                <form action="{{route('thnakademik.update', $item->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="thn">Tahun Akademik</label>
                      <input type="text" class="form-control" name="thn" placeholder="Masukan Tahun Akademik..." value="{{$item->thn}}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                          <option>-- Pilih Status --</option>
                          <option value="Aktif" @if($item->status == 'Aktif') selected @endif>Aktif</option>
                          <option value="Tidak Aktif" @if($item->status == 'Tidak Aktif') selected @endif>Tidak Aktif</option>
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