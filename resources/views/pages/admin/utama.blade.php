<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;1,200;1,300;1,400&display=swap" rel="stylesheet">
    <style>
      body {
        font-family: 'Poppins', sans-serif;
      }

      .container {
        padding-top: 60px;
        padding-bottom: 60px;
      }

      .container .row .logo img{
        width: 350px;
        margin-top: 40px;
        margin-bottom: 40px;
      }

      .container .row .header h1 {
        font-size: 50px;
        color: #1f5dda;
      }

      .container .row .sapa h3 {
        font-size: 30px;
        color: #1f5dda;
      }

      .container .row .tombol .btn-dashboard {
        background-color: #1f5dda;
        padding: 10px 20px 10px 20px;
        color: #fff;
        font-size: 18px;
        border-radius: 15px 0px 15px 0px;
      }

      .container .row .tombol .btn-dashboard:hover {
        color: #1f5dda;
        background-color: transparent;
        border-color: #1f5dda;
      }
    </style>

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 header text-center">
          <h1>Student Care System</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 sapa text-center">
          <h3>Selamat Datang {{Auth::user()->name}}</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 logo text-center">
          <img src="{{'gambar/yski.png'}}" alt="">
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 tombol text-center">
          <a href="{{route('dashboard')}}" class="btn btn-dashboard">Masuk Dashboard</a>
        </div>
      </div>
    </div>
    {{-- <div class="container">
      <div class="row ">
        <div class="col-lg-6 kiri">
          <h1>
            Selamat Datang di Sistem Pelanggaran Siswa
          </h1>
          <h3>
            Sistem ini dibuat guna untuk mencatat semua pelanggaran yang dibuat oleh siswa. Guna menyelenggaran pendidikan lebih baik lagi
          </h3>
          <a href="{{route('dashboard')}}" class="btn btn-primary">Masuk Dashboard</a>
        </div>
        <div class="col-lg-6 kanan">
          <img src="{{'gambar/header.png'}}" alt="">
        </div>
      </div>
    </div> --}}
    

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