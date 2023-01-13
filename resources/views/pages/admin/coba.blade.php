<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="">
        <div class="form-group">
            <label for="">Unit</label>
            <select name="unit" id="unit">
                <option value="">Pilih Unit</option>
                @foreach ($data as $u)
                    <option value="{{$u->id}}">{{$u->unit}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Kelas</label>
            <select id="kelas" name="kelas">
                <option value="">Pilih Kelas</option>
            </select>
        </div>
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
                    }
                });
            });
        });
    </script>
</body>
</html>