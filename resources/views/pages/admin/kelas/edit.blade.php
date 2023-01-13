@extends('layouts.admin')

@section('title')
    Edit Data Kelas
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Data Kelas</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Kelas</h6>
            </div>
            <div class="card-body">
                <form action="{{route('kelas.update', $item->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="kelas">Kelas</label>
                      <input type="text" class="form-control" name="kelas" placeholder="Masukan Kelas..." value="{{$item->kelas}}">
                    </div>
                    <div class="form-group">
                        <label for="unit_id">Unit</label>
                        <select class="form-control" name="unit_id">
                          <option value="{{$item->unit_id}}">{{$item->unit->unit}}</option>
                          @foreach ($unit as $u)
                            <option value="{{$u->id}}">{{$u->unit}}</option>
                          @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('kelas.index')}}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection