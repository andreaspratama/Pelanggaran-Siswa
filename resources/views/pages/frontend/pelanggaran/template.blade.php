<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        .line-title {
            border: 0;
            border-style: unset;
            border-top: 3px solid #000;
        }
    </style>

    <title>Hello, world!</title>
  </head>
  <body>
    <img src="{{storage_path("app/public/gambar/yski.png")}}" alt="" class="logo" style="position:absolute; width: 60px; height: auto;">
    <table style="width: 100%;">
        <tr>
            <td align="center">
                <span style="line-height: 1.6; font-weight: bold;">
                    Yayasan Sekolah Kristen Indonesia
                    <br>Semarang
                </span>
            </td>
        </tr>
    </table>

    <hr class="line-title">

    <table class="table table-bordered table-hover">
        <thead>
          <tr>
                <th>No</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Pelapor</th>
                <th scope="col">Wali Kelas</th>
                <th scope="col">Jenis Pelanggaran</th>
                <th scope="col">Catatan</th>
                <th scope="col">Point</th>
                <th scope="col">Bukti</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($pelanggaran as $p)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$p->siswa->nama}}</td>
                    <td>{{$p->sub->sub}}</td>
                    <td>{{$p->pelapor}}</td>
                    <td>{{$p->wk->nama}}</td>
                    <td>{{$p->jnspelang->jns}}</td>
                    <td>{{$p->catatan}}</td>
                    <td>{{$p->point}}</td>
                    <td>
                        <img src="{{storage_path("app/public/" . $p->bukti)}}" alt="" class="img-thumbnail" width="100px">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>