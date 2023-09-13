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
    {{-- <style>
        #ga {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #ga td,
        #ga th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #ga tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #ga tr:hover {
            background-color: #ddd;
        }

        #ga th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style> --}}
</head>

<body>
    <center>
        <h1>Data GA</h1>
    </center>
    <table id="ga" class='table-bordered table'>
        <thead>
            <tr>
                <th style="width: 5%;">
                    No
                </th>
                <th style="width: 15%;">Nama</th>
                <th style="width: 10%;">
                    Created</th>
                <th style="width: 10%;">
                    GA</th>
                <th style="width: 10%;">
                    Shift</th>
                <th style="width: 10%;">Grub
                </th>
                <th style="width: 10%;">Spray Air
                </th>
                <th style="width: 10%;">
                    Density</th>
                <th style="width: 10%;">Viscosity</th>
                <th style="width: 10%;">Weight</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($report as $data)
            <tr>
                <td>
                    {{ $data->id }}
                </td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->created_at }}</td>
                <td>{{ $data->dept }}</td>
                <td>{{ $data->shift }}</td>
                <td>{{ $data->grub }}</td>
                <td>{{ $data->spray }}</td>
                <td>{{ $data->density }}</td>
                <td>{{ $data->viscosity }}</td>
                <td>{{ $data->weight }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>