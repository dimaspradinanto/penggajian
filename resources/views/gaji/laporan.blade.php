<!DOCTYPE html>
<html>
<head>
    <title>Laporan Gaji</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Laporan Gaji</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Karyawan</th>
                <th>Tanggal</th>
                <th>Jumlah Gaji</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gajis as $gaji)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $gaji->karyawan->nama }}</td>
                <td>{{ \Carbon\Carbon::parse($gaji->tanggal)->format('d M Y') }}</td>
                <td>Rp. {{ number_format($gaji->jumlah_gaji, 2, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
