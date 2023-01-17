<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Unit</th>
            <th>Kelas</th>
            <th>Sub Kelas</th>
        </tr>
        <tr>
            @foreach ($data as $d)
                <td>{{$d->unit->unit}}</td>
                <td>{{$d->kelas->kelas}}</td>
                <td>{{$d->sub->sub}}</td>
            @endforeach
        </tr>
    </table>
</body>
</html>