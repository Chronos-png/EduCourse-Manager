<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            /* Using Times New Roman */
            font-size: 12px;
            /* Font size set to 12px */
            margin: 30px;
        }

        h1 {
            text-align: center;
            font-size: 16px;
            /* Adjusting the size of the title */
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 8px 12px;
            border: 1px solid #000;
            /* Solid border for clear lines */
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e0e0e0;
            /* Slight hover effect */
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
        }
    </style>
</head>

<body>

    <h1>Daftar Kursus</h1>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kursus</th>
                    <th>Harga</th>
                    <th>Jumlah Siswa Terdaftar</th>
                    <th>Status Kursus</th>
                    <th>Tanggal Dibuat</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 0;
                @endphp
                @foreach ($courses as $course)
                    @php
                        $no++;
                    @endphp
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $course->nama_kursus }}</td>
                        <td>{{ number_format($course->harga, 0, ',', '.') }}</td>
                        <td>{{ $course->jumlah_siswa_yang_terdaftar }}</td>
                        <td>{{ $course->status_kursus == 'active' ? 'Aktif' : ($course->status_kursus == 'inactive' ? 'Tidak Aktif' : 'Tidak Diketahui') }}
                        </td>
                        <td>{{ $course->tgl_dibuat }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
