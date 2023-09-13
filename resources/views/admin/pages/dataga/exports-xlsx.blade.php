<table>
    <thead>
        <tr>
            <th>
                No
            </th>
            <th>Nama</th>
            <th>
                Created</th>
            <th>
                GA</th>
            <th>
                Shift</th>
            <th>Grub
            </th>
            <th>Spray Air
            </th>
            <th>
                Density</th>
            <th>Viscosity</th>
            <th>Weight</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $dt)
            <tr>
                <td>
                    {{ $dt->id }}
                </td>
                <td>{{ $dt->name }}</td>
                <td>{{ $dt->created_at }}</td>
                <td>{{ $dt->dept }}</td>
                <td>{{ $dt->shift }}</td>
                <td>{{ $dt->grub }}</td>
                <td>{{ $dt->spray }}</td>
                <td>{{ $dt->density }}</td>
                <td>{{ $dt->viscosity }}</td>
                <td>{{ $dt->weight }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
