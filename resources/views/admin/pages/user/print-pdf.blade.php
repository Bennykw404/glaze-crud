<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PRINT OUT DATA GLAZE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
</head>

<body>
    <center>
        <h1>Data Karyawan</h1>
    </center>
    <table id="ga" class='table-bordered table'>
        <thead>
            <tr>
                <th style="width: 5%;">
                    No
                </th>
                <th style="width: 15%;">Nama</th>
                <th style="width: 10%;">
                    Username</th>
                <th style="width: 10%;">
                    Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $dt)
                <tr>
                    <td>
                        {{ $dt->id }}
                    </td>
                    <td>{{ $dt->name }}</td>
                    <td>{{ $dt->username }}</td>
                    <td>{{ $dt->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
