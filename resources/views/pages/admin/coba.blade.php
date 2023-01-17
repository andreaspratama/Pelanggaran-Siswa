<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('coba.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Unit</label>
            <select name="unit_id" id="unit">
                <option value="">Pilih Unit</option>
                @foreach ($data as $u)
                    <option value="{{$u->id}}">{{$u->unit}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Kelas</label>
            <select id="kelas" name="kelas_id">
                <option value="">Pilih Kelas</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Sub Kelas</label>
            <select id="sub" name="sub_id">
                <option value="">Pilih Sub Kelas</option>
            </select>
        </div>
        <button type="submit">Simpan</button>
        <a href="{{route('cobaliat')}}" class="btn">Lihat</a>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#unit').on('change', function () {
                var unitId = this.value;
                $('#kelas').html('');
                $.ajax({
                    url: '{{ route('getKelas') }}?unit_id='+unitId,
                    type: 'get',
                    success: function (res) {
                        $('#kelas').html('<option value="">Pilih Kelas</option>');
                        $.each(res, function (key, value) {
                            $('#kelas').append('<option value="' + value
                                .id + '">' + value.kelas + '</option>');
                        });
                        $('#sub').html('<option value="">Select Sub Kelas</option>');
                    }
                });
            });
            $('#kelas').on('change', function () {
                var kelasId = this.value;
                $('#sub').html('');
                $.ajax({
                    url: '{{ route('getSubkelas') }}?kelas_id='+kelasId,
                    type: 'get',
                    success: function (res) {
                        $('#sub').html('<option value="">Pilih Sub Kelas</option>');
                        $.each(res, function (key, value) {
                            $('#sub').append('<option value="' + value
                                .id + '">' + value.sub + '</option>');
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>