<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Pengajuan PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            width: 8.26in;
            /* A4 width */
            height: 11.69in;
            /* A4 height */
            margin: auto;
            box-sizing: border-box;
        }

        .container {
            padding: 24px;
            width: 100%;
            box-sizing: border-box;
            page-break-inside: avoid;
        }

        .content {
            background-color: white;
            overflow: hidden;
            box-shadow: 0px 4px 6px -1px rgba(0, 0, 0, 0.1), 0px 2px 4px -1px rgba(0, 0, 0, 0.06);
            border-radius: 0.5rem;
            page-break-inside: avoid;
        }

        .header,
        .footer,
        .main-content {
            padding: 12px 16px;
            /* border-bottom: 1px solid #e2e8f0; */
            page-break-inside: avoid;
        }

        h1 {
            font-size: 24px;
            font-weight: 500;
            color: #1a202c;
        }

        /* table {
            width: 7in;
            margin-top: 24px;
            text-align: center;
            border-collapse: collapse;
            page-break-inside: auto;
        } */
        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #e2e8f0;
        }

        thead th {
            background-color: #798596;
            color: white;
        }

        /* tbody tr {
            background-color: #fcd34d;
            page-break-inside: avoid;
            page-break-after: auto;
        } */

        .no-break {
            page-break-inside: avoid;
        }

        .kop-surat {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            page-break-inside: avoid;
        }

        .kop-surat img {
            /* height: 60px; */
            margin-right: 20px;
        }

        .kop-surat div {
            font-size: 16px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="kop-surat">
            <table style="width: 85%">
                <tr>
                    <td style="width: 30%">
                        <img id="foto"
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0a/PT-PAL.svg/1024px-PT-PAL.svg.png"
                            alt="" style="height: 40px; width: auto;">
                    </td>
                    <td>
                        <div style="text-align: center">
                            PT PAL Indonesia<br>
                            Jl. Ujung Kel. Ujung, Kec. Semampir, PO BOX 1134 Surabaya 60155<br>
                            Telp (62-31) 329 2275 Fax (62-31) 329 2530
                        </div>
                    </td>
                </tr>
            </table>
            {{-- <div>
            </div>
            <div>
                Nama Institusi<br>
                Alamat<br>
                Telepon
            </div> --}}
        </div>
        <div class="content">
            <div class="header">
                <h1>Selamat Datang Dokter {{ Auth::user()->name }} - History Pengajuan</h1>
            </div>
            <div class="main-content">
                <table
                    style="
            width: 7in;
            margin-top: 24px;
            text-align: center;
            border-collapse: collapse;
            page-break-inside: auto;
            border: 2px solid #000000; /* Warna dan ketebalan border */">
                    <thead>
                        <tr style="border: 2px solid #000000; /* Warna dan ketebalan border */">
                            ">
                            <th style="background-color: #798596; padding: 10px;">Nama Pasien</th>
                            <th style="background-color: #798596; padding: 10px;">Divisi</th>
                            <th style="background-color: #798596; padding: 10px;">Poli</th>
                            <th style="background-color: #798596; padding: 10px;">Keluhan</th>
                            <th style="background-color: #798596; padding: 10px;">Tanggal Pengajuan Pemeriksaan</th>
                            <th style="background-color: #798596; padding: 10px;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengajuan->data as $item)
                            <tr class="no-break"
                                style="
            page-break-inside: avoid;
            page-break-after: auto;">
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->divisi }}</td>
                                <td>{{ $item->poli }}</td>
                                <td>{{ $item->keluhan }}</td>
                                <td>{{ $item->tglpemeriksaan }}</td>
                                <td>{{ $item->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
