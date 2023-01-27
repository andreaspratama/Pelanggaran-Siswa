@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data DATA DIRI</h1>

        <div class="card">
            <div class="card-header">
              Data Diri
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <td>{{$item->nama}}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{$item->alamat}}</td>
                    </tr>
                </table>
                {{-- @if ($item->where('id', $item->id)->first() != null)
                    <a href="" class="btn btn-warning btn-sm">
                        Edit
                    </a>
                @else
                    Silahkan isi terlebih dahulu
                @endif --}}
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
              Data Keluarga
              <a href="" class="btn btn-primary btn-sm float-right">
                Tambah Data
              </a>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        @foreach ($data as $dt)
                            @if ($dt->datadiri_id === $item->id)
                                <td>{{$dt->namaIs}}</td>
                            @endif
                        @endforeach
                    </tr>
                </table>
                @if ($item->where('id', $item->id)->first() != null)
                    <a href="" class="btn btn-warning btn-sm">
                        Edit
                    </a>
                @else
                    Silahkan isi terlebih dahulu
                @endif
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection