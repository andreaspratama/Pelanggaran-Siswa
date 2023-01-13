@extends('layouts.admin')

@section('title')
    Edit Data Unit
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Data Unit</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Unit</h6>
            </div>
            <div class="card-body">
                <form action="{{route('unit.update', $item->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="unit">Unit</label>
                      <input type="text" class="form-control" name="unit" placeholder="Masukan Unit..." value="{{$item->unit}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('unit.index')}}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection